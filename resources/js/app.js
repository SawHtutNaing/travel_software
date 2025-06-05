import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


Alpine.start();
document.addEventListener('DOMContentLoaded', function () {
    // Booking form validation
    const bookingForm = document.getElementById('booking-form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function (e) {
            const bookingDate = document.getElementById('booking_date').value;
            const persons = document.getElementById('persons').value;

            if (!bookingDate || !persons || persons < 1) {
                e.preventDefault();
                alert('Please fill out all fields and ensure the number of persons is at least 1.');
            } else {
                if (!confirm('Confirm your booking?')) {
                    e.preventDefault();
                }
            }
        });
    }

    // Search form validation
    const searchForm = document.querySelector('form[action="{{ route('search') }}"]');
    if (searchForm) {
        searchForm.addEventListener('submit', function (e) {
            const destination = document.getElementById('destination').value;
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;

            if (!destination && !startDate && !endDate) {
                e.preventDefault();
                alert('Please provide at least one search criterion.');
            }
        });
    }

    // Profile form validation
    const profileForm = document.querySelector('form[action="{{ route('profile.update') }}"]');
    if (profileForm) {
        profileForm.addEventListener('submit', function (e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;

            if (!name || !email) {
                e.preventDefault();
                alert('Name and email are required.');
            }
        });
    }

    // Review form validation
    const reviewForm = document.querySelector('form[action*="{{ route('reviews.store', '') }}"]');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function (e) {
            const rating = document.getElementById('rating').value;

            if (!rating) {
                e.preventDefault();
                alert('Please select a rating.');
            }
        });
    }

    // Announcement form validation
    const announcementForms = document.querySelectorAll('form[action="{{ route('announcements.store') }}"], form[action*="{{ route('announcements.update', '') }}"]');
    announcementForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            const title = form.querySelector('#title').value;
            const content = form.querySelector('#content').value;

            if (!title || !content) {
                e.preventDefault();
                alert('Title and content are required.');
            }
        });
    });

    // Delete confirmation
    const deleteForms = document.querySelectorAll('form[onsubmit]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!confirm('Are you sure you want to delete this?')) {
                e.preventDefault();
            }
        });
    });
});
