const urlParams = new URLSearchParams(window.location.search);
const showtimeId = urlParams.get('showtime_id');
console.log("Showtime ID from URL:", showtimeId); 

async function getPriceFromShowtime(showtimeId) {
    if (!showtimeId) {
        console.error("Showtime ID is missing!");
        return 0; 
    }

    try {
        const response = await fetch(`/get-showtime-price/${showtimeId}`);
        const data = await response.json();
        console.log("Price from API:", data.price); 
        return data.price; 
    } catch (error) {
        console.error('Error fetching price:', error);
        return 0; 
    }
}

document.querySelectorAll('.num').forEach((seat) => {
    seat.addEventListener('click', async () => {
        const checkbox = seat.previousElementSibling; 
        if (!checkbox.disabled) {
            checkbox.checked = !checkbox.checked;
            console.log("Checkbox state changed:", checkbox.checked); 

            const seatId = checkbox.id;
            const price = await getPriceFromShowtime(showtimeId); 

            if (checkbox.checked) {
                addSeatToInvoice(seatId, price, checkbox, seat);
            } else {
                removeSeatFromInvoice(seatId, price, checkbox, seat);
            }
        }
    });
});

function addSeatToInvoice(seatId, price, checkbox, seat) {
    const ticketList = document.querySelector('.it-ticket-holder'); 
    console.log("Adding seat to invoice", seatId, price); 

    const ticketItem = document.createElement('li');
    ticketItem.classList.add('it-ticket');

    ticketItem.innerHTML = `
        <div class="it-ticket-info seat vertical-dashed-divider it-row-box it-flex-critical">
            <div class="it-p-side-16 it-col-box it-flex-central">
                <p class="it-text-content"> صندلی</p>
                <p class="it-light-heading no-gutter">${seatId}</p>
            </div>
        </div>
        <div class="it-ticket-price seat">
            <p class="it-sm-text">قیمت</p>
            <p class="it-lg-heading white-text t-align-left it-price">${price} <span class="it-toman light">تومان</span></p>
        </div>
        <div class="it-ticket-trash" data-seat-id="${seatId}"><i class="fa fa-trash"></i></div>
    `;

    ticketList.appendChild(ticketItem);

    updateTotalPrice(price);

    ticketItem.querySelector('.it-ticket-trash').addEventListener('click', () => {
        console.log("Trash clicked for seat:", seatId); 
        ticketItem.remove();

        let numericPrice = typeof price === 'string' ? parseInt(price.replace(',', '').replace(' تومان', '')) : price;
        updateTotalPrice(-numericPrice);

        const relatedCheckbox = document.getElementById(seatId);
        if (relatedCheckbox) {
            relatedCheckbox.checked = false; 
            console.log("Checkbox state after removal:", relatedCheckbox.checked); 

            const relatedSeat = relatedCheckbox.nextElementSibling; 
            if (relatedSeat) {
                console.log("Removing styles from seat:", relatedSeat); 
                relatedSeat.classList.remove('selected'); 
                relatedSeat.style.color = ''; 
                relatedSeat.style.backgroundColor = ''; 
            }
        }
    });
}

function removeSeatFromInvoice(seatId, price, checkbox, seat) {
    const ticketList = document.querySelector('.it-ticket-holder');
    const tickets = ticketList.querySelectorAll('.it-ticket');
    console.log("Removing seat from invoice:", seatId);

    tickets.forEach(ticket => {
        const ticketSeatId = ticket.querySelector('.it-ticket-trash').getAttribute('data-seat-id');
        if (ticketSeatId == seatId) {
            ticket.remove(); 

            let numericPrice = typeof price === 'string' ? parseInt(price.replace(',', '').replace(' تومان', '')) : price;

            updateTotalPrice(-numericPrice); 

            if (checkbox) {
                checkbox.checked = false; 
            }

            const relatedSeat = document.querySelector(`.num[id="${seatId}"]`).nextElementSibling; 
            if (relatedSeat) {
                console.log("Removing styles from seat:", relatedSeat); 
                relatedSeat.classList.remove('selected'); 
                relatedSeat.style.color = ''; 
                relatedSeat.style.backgroundColor = ''; 
            }
        }
    });
}

function updateTotalPrice(priceChange) {
    const totalPriceElement = document.querySelector('.it-text2 span');
    console.log("Updating total price with:", priceChange); 

    const currentTotal = parseInt(
        totalPriceElement.textContent.replace(/,/g, '').replace(' تومان', '')
    ) || 0;

    const newTotal = currentTotal + priceChange;

    totalPriceElement.textContent = `${newTotal.toLocaleString()} تومان`;
}




document.getElementById('buyButton').addEventListener('click', async () => {
    const seats = []; 

    document.querySelectorAll('.it-ticket').forEach(ticket => {
        const seatId = ticket.querySelector('.it-light-heading')?.textContent.trim();
        if (seatId) {
            seats.push(seatId); 
        }
    });

    if (seats.length === 0) {
        alert('هیچ صندلی برای رزرو انتخاب نشده است!');
        return;
    }

    const urlParams = new URLSearchParams(window.location.search);
    const showtimeId = urlParams.get('showtime_id');

    if (!showtimeId) {
        alert('شناسه سانس موجود نیست!');
        return;
    }

    console.log({
        seats, 
        showtime_id: parseInt(showtimeId, 10)
    });

    try {
        const response = await fetch('/reserve-seats', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ 
                seats, 
                showtime_id: parseInt(showtimeId, 10),
            }),
        });

        if (!response.ok) {
            throw new Error(`خطا در ارسال درخواست به سرور: ${response.statusText}`);
        }

        const data = await response.json();

        if (data.success) {
          
    const reservationId = data.reservation_id; 
    alert('رزرو با موفقیت انجام شد!');
    window.location.href = `/receipt/${reservationId}`;

               } else {
            alert(data.message || 'خطایی رخ داد.');
            console.log('صندلی‌های مشکل‌دار:', data.conflicts);
        }

    } catch (error) {
        console.error('Error reserving seats:', error);
        alert('خطایی در رزرو صندلی‌ها رخ داد.');
    }
});






document.addEventListener('DOMContentLoaded', async () => {
    const urlParams = new URLSearchParams(window.location.search);
    const showtimeId = urlParams.get('showtime_id');

    if (!showtimeId) {
        alert('شناسه سانس موجود نیست!');
        return;
    }

    try {
        const response = await fetch(`/get-seats-status/${showtimeId}`);
        
        if (!response.ok) {
            throw new Error(`خطا در ارسال درخواست به سرور: ${response.statusText}`);
        }

        const data = await response.json();

        data.seats.forEach(seat => {
            if (seat.status === 'reserved') {
                const checkbox = document.getElementById(seat.seat_number); 
                
                if (checkbox) {
                    checkbox.disabled = true; 
                    checkbox.parentElement.classList.add('disabled'); 
                }
            }
        });
    } catch (error) {
        console.error('Error fetching seats status:', error);
        alert('خطایی در دریافت وضعیت صندلی‌ها رخ داد.');
    }
});