const filter = document.getElementsByClassName('featured__item');
const target = document.getElementById('featured__content');

Array.prototype.forEach.call(filter, function(el) {
    el.addEventListener('click', fetchCars);
});

function fetchCars(event) {  // Do stuff here
    event.preventDefault();
    const link = event.currentTarget;
    const href = link.getAttribute('href');

    try {
        fetch(href)
            .then(response => response.json())
            .then(data => data.forEach((car, index) => {
                if (index === 0) {
                    target.innerHTML = ` <article class="featured__card mix tesla">
                        <div class="shape shape__smaller"></div>
                        <h1 class="featured__title">${car.name}</h1>
                        <h3 class="featured__subtitle">${car.model}</h3>

                        <img src="{{ asset('build/images/' ~ car.leftSideImage) }}" alt="" class="featured__img">

                        <h3 class="featured__price">${car.price}</h3>

                        <button class="button featured__button">
                            <i class="ri-shopping-bag-2-line"></i>
                        </button>
                    </article>`
                }
                 else {
                    target.innerHTML += ` <article class="featured__card mix tesla">
                        <div class="shape shape__smaller"></div>
                        <h1 class="featured__title">${car.name}</h1>
                        <h3 class="featured__subtitle">${car.model}</h3>

                        <img src="{{ asset('build/images/' ~ car.leftSideImage) }}" alt="" class="featured__img">

                        <h3 class="featured__price">${car.price}</h3>

                        <button class="button featured__button">
                            <i class="ri-shopping-bag-2-line"></i>
                        </button>
                    </article>`
                 }
            }))
    } catch (error) {
        console.log(error);
    }
}
