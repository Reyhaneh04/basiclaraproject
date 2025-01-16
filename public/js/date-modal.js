document.addEventListener("DOMContentLoaded", () => {
    const today = new Date();
    const dateSelectionContainer = document.getElementById("date-selection-container");

    const selectedMovieId = getMovieIdFromUrl();
    console.log("selectedMovieId:", selectedMovieId); 

    for (let i = 0; i <= 6; i++) {
        const newDate = new Date(today);
        newDate.setDate(today.getDate() + i);

        const dateBox = document.createElement("div");
        dateBox.classList.add("date-box");
        dateBox.dataset.date = newDate.toISOString().split("T")[0]; 

        const dateText = document.createElement("span");
        dateText.textContent = newDate.toLocaleDateString("fa-IR", {
            weekday: "long",
            day: "numeric",
            month: "long",
        });

        dateBox.appendChild(dateText);
        dateSelectionContainer.appendChild(dateBox);

        dateBox.addEventListener("click", () => {
            const previouslySelected = document.querySelector(".date-box.selected");
            if (previouslySelected) {
                previouslySelected.classList.remove("selected");
            }

            dateBox.classList.add("selected");

            const selectedDate = dateBox.dataset.date;
            localStorage.setItem("selectedDate", selectedDate);

            console.log("تاریخ انتخاب‌شده:", selectedDate);

            loadCinemasForCity(1, selectedDate, selectedMovieId);
        });
    }

    let selectedDate = localStorage.getItem("selectedDate");
    if (!selectedDate) {
        selectedDate = today.toISOString().split("T")[0]; 
    }

    console.log("تاریخ اولیه برای بارگذاری سینماها:", selectedDate);

    loadCinemasForCity(1, selectedDate, selectedMovieId);

    const selectedDateBox = document.querySelector(`.date-box[data-date="${selectedDate}"]`);
    if (selectedDateBox) {
        selectedDateBox.classList.add("selected");
    }

    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("btn-show")) {
            const showtimeId = e.target.dataset.showtimeId;
    
            checkLoginStatus()
            .then((loggedIn) => {
                const redirectUrl = `/booking?showtime_id=${showtimeId}`; 
        
                if (loggedIn) {
                  
                    window.location.href = redirectUrl;
                } else {
                  
                    window.location.href = `/login?redirect=${encodeURIComponent(redirectUrl)}`;
                }
            })
            .catch((error) => {
                console.error("خطا در بررسی وضعیت ورود:", error);
            });
        }
    });
    
});

function getMovieIdFromUrl() {
    const pathSegments = window.location.pathname.split("/");
    return pathSegments[pathSegments.length - 1]; 
}

function loadCinemasForCity(cityId, selectedDate, selectedMovieId) {
    const url = cityId === 1 ? "/cinemas-for-city/1" : `/cinemas-for-city/${cityId}`;

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            const cinemaAccordion = document.getElementById("cinema-accordion");
            cinemaAccordion.innerHTML = "";

            if (data.length > 0) {
                data.forEach((cinema, index) => {
                    const accordionCard = document.createElement("div");
                    accordionCard.classList.add("accordion__card");
                    accordionCard.innerHTML = `
                    <div class="card-header" id="heading${index}">
                        <button id="cinema-btn-${cinema.id}" type="button" data-cinema-id="${cinema.id}" data-toggle="collapse" data-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}" style="display: flex; align-items: center; justify-content: flex-start; text-align: right;">
                            <img src="/img/cinema/${cinema.image}" alt="${cinema.name}" style="width: 120px; height: 120px; margin-right: 10px; border-radius: 10px;">
                            <div style="text-align:right; margin-right:20pt;margin-top:5pt;">
                                <span style="margin-bottom:-10pt;"><strong>${cinema.name}</strong></span><br>
                                <span class="card__rate"> <i class="icon ion-ios-star"></i> ${cinema.rate}</span>
                                <span style="color:rgba(255,255,255,0.5);"><i class="fas fa-location-pin"></i> ${cinema.address}</span><br>
                            </div>
                        </button>
                    </div>
                    <div id="collapse${index}" class="collapse" aria-labelledby="heading${index}" data-parent="#accordion">
                        <div class="card-body">
                            <div id="cinema-showtimes-container-${cinema.id}" class="showtimes-container"></div>
                        </div>
                    </div>
                    `;
                    cinemaAccordion.appendChild(accordionCard);

                    const button = document.getElementById(`cinema-btn-${cinema.id}`);
                    button.addEventListener("click", () => {
                        loadShowtimesForCinema(cinema.id, selectedDate, selectedMovieId);
                    });
                });
            } else {
                cinemaAccordion.innerHTML = "<p style='color:white'>هیچ سینمایی یافت نشد.</p>";
            }
        })
        .catch((error) => {
            console.error("خطا در بارگذاری سینماها:", error);
            const cinemaAccordion = document.getElementById("cinema-accordion");
            cinemaAccordion.innerHTML = "<p style='color:white'>خطا در بارگذاری سینماها. لطفاً دوباره تلاش کنید.</p>";
        });
}

function loadShowtimesForCinema(cinemaId, selectedDate, selectedMovieId) {
    if (!selectedDate) {
        const container = document.getElementById(`cinema-showtimes-container-${cinemaId}`);
        container.innerHTML = "<p style='color:white'>لطفاً تاریخ موردنظر خود را انتخاب کنید.</p>";
        return;
    }

    fetch(`/cinema-showtimes/${cinemaId}?date=${selectedDate}`)
        .then((response) => response.json())
        .then((data) => {
            const container = document.getElementById(`cinema-showtimes-container-${cinemaId}`);
            container.innerHTML = "";

            if (data.length > 0) {
                const gridContainer = document.createElement("div");
                gridContainer.classList.add("grid-container");

                let hasShowtimesForMovie = false;

                data.forEach((showtime) => {
                    if (showtime.movie_id === parseInt(selectedMovieId)) {
                        const gridItem = document.createElement("div");
                        gridItem.classList.add("grid-item");
                        gridItem.innerHTML = `
                            <div class="showtime-card">
                                <p style="color:white;"><strong></strong> ${showtime.time}</p>
                                <p><strong></strong> ${showtime.price} تومان</p>
                                <p><strong></strong> ${showtime.hall}</p>
                                <button class="btn-show" data-showtime-id="${showtime.id}">
                                    انتخاب
                                </button>
                            </div>
                        `;
                        gridContainer.appendChild(gridItem);
                        hasShowtimesForMovie = true;
                    }
                });

                if (!hasShowtimesForMovie) {
                    container.innerHTML = "<p style='color:white'>هیچ سانسی برای این فیلم در تاریخ انتخابی موجود نیست.</p>";
                } else {
                    container.appendChild(gridContainer);
                }
            } else {
                container.innerHTML = "<p style='color:white'>هیچ سانسی برای این سینما در تاریخ انتخابی موجود نیست.</p>";
            }
        })
        .catch((error) => {
            console.error("خطا در بارگذاری سانس‌ها:", error);
            const container = document.getElementById(`cinema-showtimes-container-${cinemaId}`);
            container.innerHTML = "<p style='color:white'>خطا در بارگذاری سانس‌ها. لطفاً دوباره تلاش کنید.</p>";
        });
}

function handleDateChange(selectedDate) {
    localStorage.setItem("selectedDate", selectedDate);

    const selectedCity = JSON.parse(localStorage.getItem("selectedCity"));

    if (!selectedCity) {
        alert("لطفاً ابتدا یک شهر انتخاب کنید.");
        return;
    }

    const cityId = selectedCity.id;

    loadCinemasForCity(cityId, selectedDate);
}

/**
 *
 * @returns {Promise<boolean>} 
 */
function checkLoginStatus() {
    return fetch('/is-logged-in', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("خطا در دریافت وضعیت ورود");
            }
            return response.json();
        })
        .then((data) => {
            return data.loggedIn; 
        });
}
