document.addEventListener('DOMContentLoaded', function() {

    // Prevent pinch-to-zoom on mobile
    document.addEventListener('gesturestart', function(e) {
        e.preventDefault();
    });

    // ====== UI Interactions ======
    // Mobile navigation toggle with improved accessibility
    const hamburger = document.querySelector('.hamburger');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.createElement('div'); // Creates dark overlay
    overlay.className = 'overlay';
    document.body.appendChild(overlay);

    hamburger.addEventListener('click', function() {
        const isExpanded = this.getAttribute('aria-expanded') === 'true'; // Gets the current value of the aria-expanded attribute and compares it to the string 'true'
        this.setAttribute('aria-expanded', !isExpanded); // Sets the aria-expanded attribute to the OPPOSITE of what it was
        sidebar.classList.toggle('active'); // When active class is added, CSS makes sidebar slide in from left (vice versa)
        overlay.classList.toggle('active'); // When active class is added, CSS makes the dark overlay visible (vice versa)
        
        if (!isExpanded) {
            const firstNavItem = sidebar.querySelector('a'); //Searches inside the sidebar for the first link element
            if (firstNavItem) firstNavItem.focus(); // If link was found, moves keyboard focus to that link
        }
    });

    overlay.addEventListener('click', function() {
        hamburger.click(); // Close menu when overlay clicked
    });

    // Back to top button
    const backToTopButton = document.querySelector('.back-to-top');
    window.addEventListener('scroll', function() {
        // Shows "back to top" button after scrolling 300px
        backToTopButton.classList.toggle('active', window.pageYOffset > 300);
    });
    backToTopButton.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

    // Header scroll effect
    const header = document.getElementById('header');
    window.addEventListener('scroll', function() {
        header.classList.toggle('scrolled', window.scrollY > 50); // Adds 'scrolled' class if window.scrollY > 50
    });

    // Philosophy toggle
    // getElementById() - Selects ONE element by ID
    const philosophyBox = document.getElementById('philosophy-box');
    if (philosophyBox) {
        philosophyBox.addEventListener('click', function() {
            const content = document.getElementById('philosophy-content');
            const btn = document.getElementById('philosophy-btn');
            const isVisible = content.style.display === 'block';
            content.style.display = isVisible ? 'none' : 'block';
            btn.textContent = isVisible ? 'Show Philosophy' : 'Hide Philosophy';
        });
    }

    // Testimonial slider
    // Selects MULTIPLE elements by class
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    const testimonialDots = document.querySelectorAll('.testimonial-dot');
    let currentSlide = 0;
    
    function showTestimonialSlide(n) {
        // Remove 'active' class to corresponding slide and dot
        testimonialSlides.forEach(slide => slide.classList.remove('active'));
        testimonialDots.forEach(dot => dot.classList.remove('active'));
        // going from last to first, or first to last
        currentSlide = (n + testimonialSlides.length) % testimonialSlides.length;
        // Add 'active' class to corresponding slide and dot
        testimonialSlides[currentSlide].classList.add('active');
        testimonialDots[currentSlide].classList.add('active');
    }
    
    testimonialDots.forEach((dot, index) => {
        dot.addEventListener('click', () => showTestimonialSlide(index));
    });
    
    document.getElementById('prev-testimonial')?.addEventListener('click', () => showTestimonialSlide(currentSlide - 1));
    document.getElementById('next-testimonial')?.addEventListener('click', () => showTestimonialSlide(currentSlide + 1));
    
    // Activity filter 
    const filterButtons = document.querySelectorAll('.activity-categories button');
    const filterableElements = document.querySelectorAll(`
        .activity-card,
        .video-header[data-category],
        .video-container
    `);

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Get filter value
            const filterValue = this.dataset.filter;
            
            // Hide all activity sections and videos
            document.querySelectorAll('[data-category]').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show selected sections
            document.querySelectorAll(`[data-category="${filterValue}"]`).forEach(section => {
                section.style.display = 'block';
            });
            
            // Special margin for annual events
            if (filterValue === 'annual-special-events') {
                document.querySelector('.activity-highlights[data-category="annual-special-events"]').style.marginTop = '-2rem';
            }
        });
    });

    //Gallery filter
    const galleryFilterButtons = document.querySelectorAll('.gallery-categories button');
    const galleryItems = document.querySelectorAll('.gallery-item');

    function filterGallery(filterValue) {
        galleryItems.forEach(item => {
            if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                // Shows as block element (like div)
                item.style.display = 'block';
            } else {
                // Hides the element completely
                item.style.display = 'none';
            }
        });
    }

    galleryFilterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            galleryFilterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Get filter value
            const filterValue = this.dataset.filter;
            
            // Filter the gallery
            filterGallery(filterValue);
        });
    });

    // Search functionality
    const searchInput = document.getElementById('gallerySearch');
    const searchButton = document.getElementById('searchButton');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            document.querySelectorAll('.gallery-item').forEach(item => {
                const title = item.querySelector('h3').textContent.toLowerCase();
                const caption = item.querySelector('p').textContent.toLowerCase();
                const matches = title.includes(searchTerm) || caption.includes(searchTerm);
                item.style.display = matches ? 'block' : 'none';
            });
        });
    }

    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase();
        document.querySelectorAll('.gallery-item').forEach(item => {
            const title = item.querySelector('h3').textContent.toLowerCase();
            const caption = item.querySelector('p').textContent.toLowerCase();
            const matches = title.includes(searchTerm) || caption.includes(searchTerm);
            item.style.display = matches ? 'block' : 'none';
        });
    }

    // Search when button is clicked
    if (searchButton) {
        searchButton.addEventListener('click', performSearch);
    }
    
    // Optional: Also search when Enter key is pressed
    if (searchInput) {
        // Runs EVERY TIME a key is pressed while typing in the search box
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }

    // Modal functionality
    const modal = document.getElementById('imageModal'); // The modal container
    const modalImg = document.getElementById('modalImage');
    const closeBtn = document.querySelector('.close');
    
    // Get all gallery images
    const galleryItems2 = document.querySelectorAll('.gallery-item img');
    
    // Open modal when gallery images are clicked
    galleryItems2.forEach(img => {
        img.addEventListener('click', function() {
            modal.style.display = 'block'; // Show modal
            modalImg.src = this.src;        // Set modal image to clicked image
            
            // Reset animation
            modalImg.style.animation = 'none';
            void modalImg.offsetWidth; // Trigger reflow (forces browser to reset)
            modalImg.style.animation = 'zoom 0.3s forwards';
        });
    });
    
    // Close modal
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    closeBtn.addEventListener('click', closeModal);
    
    // Close when clicking outside image
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
    
    // Close with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });

});
