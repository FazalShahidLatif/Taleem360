// mobile menu toggle
const menuToggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('nav');

menuToggle.addEventListener('click', () => {
    nav.classList.toggle('active');
});

// smooth scrolling
const scrollLinks = document.querySelectorAll('a[href^="#"]');

scrollLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        target.scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// form validation
const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
    let valid = true;

    const requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        if (!field.value) {
            valid = false;
            field.classList.add('error');
        } else {
            field.classList.remove('error');
        }
    });

    if (!valid) {
        e.preventDefault();
        alert('Please fill out all required fields.');
    }
});

// WhatsApp button functionality
const whatsappButton = document.querySelector('.whatsapp-button');

whatsappButton.addEventListener('click', () => {
    window.open('https://wa.me/1234567890', '_blank');
});

// prayer times update function
const updatePrayerTimes = () => {
    // Logic to fetch and update prayer times
    // Placeholder: Update inner HTML with new times
    const prayerTimesElement = document.querySelector('.prayer-times');
    prayerTimesElement.innerHTML = 'Updated prayer times...';
};

setInterval(updatePrayerTimes, 3600000); // Update every hour

// interactive button effects
const buttons = document.querySelectorAll('.interactive-button');

buttons.forEach(button => {
    button.addEventListener('mouseenter', () => {
        button.classList.add('hover');
    });
    button.addEventListener('mouseleave', () => {
        button.classList.remove('hover');
    });
});