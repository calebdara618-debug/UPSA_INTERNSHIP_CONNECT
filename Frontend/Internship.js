// SELECT HTML ELEMENTS

const searchInput = document.getElementById("searchInput");

const categoryFilter = document.getElementById("categoryFilter");

const locationFilter = document.getElementById("locationFilter");

const internshipCards = document.querySelectorAll(".internship-card");

const resultCount = document.getElementById("resultCount");

const noResults = document.getElementById("noResults");


// FILTER INTERNSHIPS

function filterInternships() {

    const searchValue = searchInput.value.toLowerCase();

    const selectedCategory = categoryFilter.value;

    const selectedLocation = locationFilter.value;

    let visibleCount = 0;


    internshipCards.forEach(function(card) {

        const cardText = card.textContent.toLowerCase();

        const cardCategory = card.dataset.category;

        const cardLocation = card.dataset.location;


        const matchesSearch = cardText.includes(searchValue);

        const matchesCategory =
            selectedCategory === "" ||
            cardCategory === selectedCategory;

        const matchesLocation =
            selectedLocation === "" ||
            cardLocation === selectedLocation;


        if (
            matchesSearch &&
            matchesCategory &&
            matchesLocation
        ) {

            card.style.display = "block";

            visibleCount++;

        } else {

            card.style.display = "none";

        }

    });


    // UPDATE RESULTS

    resultCount.textContent = visibleCount;


    // DISPLAY MESSAGE IF NO RESULTS

    if (visibleCount === 0) {

        noResults.style.display = "block";

    } else {

        noResults.style.display = "none";

    }

}


// SEARCH EVENT

searchInput.addEventListener("input", filterInternships);


// CATEGORY FILTER

categoryFilter.addEventListener("change", filterInternships);


// LOCATION FILTER

locationFilter.addEventListener("change", filterInternships);