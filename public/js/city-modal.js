document.addEventListener("DOMContentLoaded", () => {
    const citySelectorBtn = document.getElementById("city-selector-btn");
    const cityModal = document.getElementById("city-modal");
    const closeModalBtn = document.getElementById("close-modal");
    const cityTooltip = document.getElementById("city-tooltip");
    const searchInput = document.querySelector(".header__search-content input");
    const cityList = document.querySelector(".city-list");
    const searchButton = document.querySelector(".header__search-content button");

    const selectedCity = JSON.parse(localStorage.getItem("selectedCity"));
    const selectedDate = localStorage.getItem("selectedDate") || new Date().toISOString().split("T")[0];

    if (selectedCity) {
        cityTooltip.textContent = `${selectedCity.name}`;
        cityTooltip.style.display = "block";
        loadCinemasForCity(selectedCity.id, selectedDate); 
    } else {
        cityTooltip.textContent = 'تمام استان‌ها';
        cityTooltip.style.display = "block";
        loadCinemasForCity(1, selectedDate); 
    }

    citySelectorBtn.addEventListener("click", (event) => {
        event.preventDefault();
        cityModal.style.display = "flex";
        loadAllCities();
    });

    closeModalBtn.addEventListener("click", () => {
        cityModal.style.display = "none";
    });

    function handleCityClick(cityElement) {
        const cityName = cityElement.querySelector(".city-name").textContent.trim();
        const cityId = cityElement.getAttribute("data-city-id");
        const cityImage = cityElement.querySelector(".city-image").src;
    
        const cityData = {
            id: cityId,
            name: cityName,
            image: cityImage,
        };
        localStorage.setItem("selectedCity", JSON.stringify(cityData));
    
        cityTooltip.textContent = `${cityName}`;
        cityTooltip.style.display = "block";
    
        const selectedDate = localStorage.getItem("selectedDate") || new Date().toISOString().split("T")[0];
        
        const selectedMovieId = getMovieIdFromUrl();
    
        loadCinemasForCity(cityId, selectedDate, selectedMovieId);
    
        cityModal.style.display = "none";
    }
    function attachCityClickHandlers() {
        const cityOptions = document.querySelectorAll(".city-option");
        cityOptions.forEach((city) => {
            city.addEventListener("click", () => handleCityClick(city));
        });
    }

    

    function loadAllCities() {
        fetch('/all-cities')
            .then((response) => response.json())
            .then((data) => {
                cityList.innerHTML = "";

                data.forEach((city) => {
                    const cityItem = document.createElement("li");
                    cityItem.classList.add("city-item");
                    cityItem.innerHTML =
                        `<button class="city-option" data-city-id="${city.id}">
                            <img src="/${city.image}" alt="${city.name}" class="city-image">
                            <span class="city-name">${city.name}</span>
                        </button>`;
                    cityList.appendChild(cityItem);
                });

                const defaultCityOption = document.querySelector(".city-option[data-city-id='1']");
                if (defaultCityOption) {
                    defaultCityOption.setAttribute("aria-selected", "true");
                }

                attachCityClickHandlers();
            })
            .catch((error) => {
                console.error("Error fetching all cities:", error);
            });
    }

    function searchCities(query) {
        if (query.length > 0) {
            fetch(`/search-cities?query=${query}`)
                .then((response) => response.json())
                .then((data) => {
                    cityList.innerHTML = "";
                    if (data.length > 0) {
                        data.forEach((city) => {
                            const cityItem = document.createElement("li");
                            cityItem.classList.add("city-item");
                            cityItem.innerHTML =
                                `<button class="city-option" data-city-id="${city.id}">
                                    <img src="/${city.image}" alt="${city.name}" class="city-image">
                                    <span class="city-name">${city.name}</span>
                                </button>`;
                            cityList.appendChild(cityItem);
                        });

                        attachCityClickHandlers();
                    } else {
                        const noResultItem = document.createElement("li");
                        noResultItem.textContent = "هیچ شهری پیدا نشد.";
                        noResultItem.style.textAlign = "center";
                        noResultItem.style.color = "red";
                        noResultItem.style.width = "600pt";
                        noResultItem.style.marginTop = "100pt";
                        cityList.appendChild(noResultItem);
                    }
                })
                .catch((error) => {
                    console.error("Error searching cities:", error);
                });
        } else {
            loadAllCities();
        }
    }

    searchInput.addEventListener("input", () => {
        const query = searchInput.value.trim();
        searchCities(query);
    });

    searchButton.addEventListener("click", () => {
        const query = searchInput.value.trim();
        searchCities(query);
    });

    loadAllCities();
});
