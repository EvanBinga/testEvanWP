// Слайды, круги и текст слайдов
const slides = document.querySelectorAll('.banner-right img');
const circles = document.querySelectorAll('.circle');
const slidesText = document.querySelectorAll('.banner-slide');
let currentIndex = 0;

// Элементы стрелок переключения слайдов
const [prevArrow, nextArrow] = [document.getElementById('prev-arrow'), document.getElementById('next-arrow')];

// Функция обновления текущего слайда
const updateSlide = (index) => {
    slides.forEach((slide, i) => slide.classList.toggle('active', i === index));
    circles.forEach((circle, i) => circle.style.backgroundColor = i === index ? '#ff0000' : '#ffffff');
    slidesText.forEach((text, i) => text.classList.toggle('active', i === index));
};

// Переключение слайдов
nextArrow.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % slides.length;
    updateSlide(currentIndex);
});

prevArrow.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    updateSlide(currentIndex);
});

circles.forEach((circle, index) => {
    circle.addEventListener('click', () => {
        currentIndex = index;
        updateSlide(currentIndex);
    });
});

// Открытие/закрытие меню
document.addEventListener("DOMContentLoaded", () => {
    const burgerMenu = document.querySelector('.burger-menu');
    const menu = document.querySelector('.menu');

    burgerMenu.addEventListener('click', () => {
        menu.classList.toggle('active');
        burgerMenu.classList.toggle('active'); // Для анимации бургер-иконки
    });
});

// Работа с модальным окном
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById('contact-modal');
    const bannerBtn = document.getElementById('banner-btn');  // Кнопка в баннере
    const callbackBtn = document.getElementById('callback-btn'); // Кнопка "Связаться" в callback-box
    const closeBtn = document.querySelector('.modal .close');

    // Открытие модального окна
    const openModal = (event) => {
        event.preventDefault(); // Предотвращаем переход по ссылке
        modal.style.display = 'flex'; // Открываем модальное окно
    };

    bannerBtn.addEventListener('click', openModal);
    callbackBtn.addEventListener('click', openModal);

    // Закрытие модального окна по нажатию на крестик и при клике вне формы
    closeBtn.addEventListener('click', () => modal.style.display = 'none');
    window.addEventListener('click', (event) => {
        if (event.target === modal) modal.style.display = 'none';
    });
});

// Отправка данных формы в Telegram
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById('contact-modal');
    const closeBtn = document.querySelector('.modal .close');
    const form = document.getElementById('contact-form');

    // Открытие модального окна по клику на кнопки
    document.querySelectorAll('.modal-btn').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            modal.style.display = 'flex';
        });
    });

    // Закрытие модального окна
    closeBtn.addEventListener('click', () => modal.style.display = 'none');
    window.addEventListener('click', (event) => {
        if (event.target === modal) modal.style.display = 'none';
    });

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(form);
        const name = formData.get('name');
        const email = formData.get('email');
        const message = formData.get('message');

        const token = '8030038428:AAE3l-3Rwu3ylHB5iFN34r9sMuT5OIo8Zcg';
        const chatId = '5968097103';

        const messageText = `Имя: ${name}\nEmail: ${email}\nСообщение: ${message}`;

        try {
            const response = await fetch(`https://api.telegram.org/bot${token}/sendMessage`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    chat_id: chatId,
                    text: messageText,
                }),
            });
            const data = await response.json();
            if (data.ok) {
                alert('Сообщение отправлено!');
                modal.style.display = 'none'; // Закрываем модальное окно
            } else {
                alert('Ошибка отправки сообщения.');
            }
        } catch (error) {
            console.error('Ошибка:', error);
            alert('Произошла ошибка при отправке сообщения.');
        }
    });
});
