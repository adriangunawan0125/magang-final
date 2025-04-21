/* Fixed script.js */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize fade-in animations - FIXED
    const fadeElements = document.querySelectorAll('.fade-in');
    fadeElements.forEach(function(element) {
        // Apply visible class immediately to fix stuck loading issue
        element.classList.add('visible');
    });
    
    // Initialize Modal for Kegiatan Section
    const kegiatanItems = document.querySelectorAll('.kegiatan-item');
    const modalImage = document.getElementById('modalImage');
    let kegiatanModal = null;
    
    if (document.getElementById('kegiatanModal')) {
        kegiatanModal = new bootstrap.Modal(document.getElementById('kegiatanModal'));
        
        // Event handler for clicking on activity images
        kegiatanItems.forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get image path from data attribute
                const imgPath = this.getAttribute('data-img');
                
                if (imgPath && modalImage) {
                    // Set image source for modal
                    modalImage.src = imgPath;
                    
                    // Show modal
                    kegiatanModal.show();
                }
            });
        });
    }
    
    // Stats counter animation for profile page - FIXED
    const counters = document.querySelectorAll('.stats-number');
    if (counters.length > 0) {
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target')) || 0;
            
            // Set initial value to prevent stuck loading
            counter.textContent = '0';
            
            // Set simple animation for counter
            let current = 0;
            const increment = Math.ceil(target / 30); // Faster animation
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = current;
                }
            }, 30);
        });
    }
});