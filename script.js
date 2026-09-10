document.addEventListener('DOMContentLoaded', () => {
    // Identifying the search input on any page of the website.
    const searchInput = document.querySelector('input[type="text"][placeholder*="Search"], .search-bar input, #searchInput, .search-bar-small input');
    
    if (searchInput) {
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = searchInput.value.trim();
                if (query) {
                    // Redirect to the shop.html page with the search term after pressing Enter.
                    window.location.href = `shop.html?search=${encodeURIComponent(query)}`;
                }
            }
        });
    }
});