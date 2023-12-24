document.getElementById('toggleBtn').addEventListener('click', function() {
    var hiddenElement = document.getElementById('hiddenElement');
    
    if (hiddenElement.classList.contains('hidden')) {
        hiddenElement.style.display = 'block'; // Show the element
        setTimeout(function() {
            hiddenElement.style.opacity = '1'; // Set opacity to 1 after a short delay
        }, 10);
        hiddenElement.classList.remove('hidden'); // Remove the 'hidden' class
    } else {
        hiddenElement.style.opacity = '0'; // Set opacity to 0
        setTimeout(function() {
            hiddenElement.style.display = 'none'; // Hide the element after the transition
        }, 500); // Adjust this time to match the transition duration
        hiddenElement.classList.add('hidden'); // Add the 'hidden' class
    }
});

let bookArray = [
    { book_name: 'Tiếng Việt 1 (Tập 1)', book_ID: '1'},
    { book_name: 'Tiếng Việt 1 (Tập 2)', book_ID: '2'},
    { book_name: 'Lược Sử Thời Gian', book_ID: '3'},
    { book_name: 'Đất Rừng Phương Nam', book_ID: '4'},
    { book_name: 'Doraemon', book_ID: '5'},
    { book_name: 'Giết Con Chim Nhại', book_ID: '7'},
    { book_name: 'Mắt Biếc', book_ID: '8'},
    { book_name: 'Thám Tử Lừng Danh Conan', book_ID: '9'},
    { book_name: 'Shin - Cậu Bé Bút Chì', book_ID: '10'},
    { book_name: 'Vũ Trụ Trong Vỏ Hạt Dẻ', book_ID: '11'},
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
    let result = [];
    let input = inputBox.value;
    const bookNames = bookArray.map(book => book.book_name);
    if (input.length) {
        result = bookNames.filter((keyword)=>{
            return (keyword.toLowerCase().replace(/\s+/g, ' ').trim()).includes(input.toLowerCase().replace(/\s+/g, ' ').trim());
        });
        console.log(result);
    }
    display(result);

    if (!result.length) {
        resultsBox.innerHTML = '';
    }
}

function display(result){
    const content = result.map((list)=>{
        return "<li onclick=selectInput(this)>" + list + "</li>";
    });

    resultsBox.innerHTML = "<ul>" + content.join('') + "</ul> ";
}

function findBookID(bookName) {
    const bookObject = bookArray.find(book => book.book_name === bookName);
    return bookObject ? bookObject.book_ID : null;
}

function selectInput(bookName) {
    const ID = findBookID(bookName.innerHTML);
    // window.location.href = 'search_product.php?book=${encodeURIComponent(bookID)}';
    const url = 'search_product.php?book=' + ID;
    window.location.href = url;
}

function searchButton() {
    let searchTerm = inputBox.value.replace(/\s+/g, ' ').trim();
    const url = 'search_by_name.php?search=' + searchTerm;
    window.location.href = url;
}

function selectProduct(bookID) {
    const url = 'single_product.php?id=' + bookID;
    window.location.href = url;
}

document.addEventListener('DOMContentLoaded', function() {
    const seeMoreBtn1 = document.getElementById('seeMoreBtn1');
    const items1 = document.querySelectorAll('.item1');

    const seeMoreBtn2 = document.getElementById('seeMoreBtn2');
    const items2 = document.querySelectorAll('.item2');

    const seeMoreBtn3 = document.getElementById('seeMoreBtn3');
    const items3 = document.querySelectorAll('.item3');

    const seeMoreBtn4 = document.getElementById('seeMoreBtn4');
    const items4 = document.querySelectorAll('.item4');

    // Initial number of items to display
    let visibleItemCount1 = 4;
    let visibleItemCount2 = 4;
    let visibleItemCount3 = 4;
    let visibleItemCount4 = 4;

    // Show/hide items based on the current state
    function toggleItems(items, seeMoreBtn, visibleItemCount) {
        items.forEach((item, index) => {
            if (index < visibleItemCount) {
                item.classList.remove('hidden');
            }
        });

        // Toggle the "See More" button based on the number of hidden items
        seeMoreBtn.style.display = (visibleItemCount < items.length) ? 'block' : 'none';
    }

    // Event listener for the "See More" button
    seeMoreBtn1.addEventListener('click', function() {
        visibleItemCount1 += 12; // Increase the number of visible items
        toggleItems(items1, seeMoreBtn1, visibleItemCount1); // Show/hide items
    });

    seeMoreBtn2.addEventListener('click', function() {
        visibleItemCount2 += 12; // Increase the number of visible items
        toggleItems(items2, seeMoreBtn2, visibleItemCount2); // Show/hide items
    });

    seeMoreBtn3.addEventListener('click', function() {
        visibleItemCount3 += 12; // Increase the number of visible items
        toggleItems(items3, seeMoreBtn3, visibleItemCount3); // Show/hide items
    });

    seeMoreBtn4.addEventListener('click', function() {
        visibleItemCount4 += 12; // Increase the number of visible items
        toggleItems(items4, seeMoreBtn4, visibleItemCount4); // Show/hide items
    });

    // Initial setup
    toggleItems(items1, seeMoreBtn1, visibleItemCount1);
    toggleItems(items2, seeMoreBtn2, visibleItemCount2);
    toggleItems(items3, seeMoreBtn3, visibleItemCount3);
    toggleItems(items4, seeMoreBtn4, visibleItemCount4);
});

document.addEventListener('DOMContentLoaded', function () {
    // Get the select element and item container
    const sortSelect = document.getElementById('sort');
    const itemContainer = document.getElementById('itemContainer');

    // Add event listener to handle changes in the select element
    sortSelect.addEventListener('change', function () {
        // Get the selected value
        const selectedValue = sortSelect.value;

        // Get all items inside the container
        const items = Array.from(itemContainer.children);

        // Sort items based on the selected option
        if (selectedValue === 'h2l') {
            items.sort((a, b) => {
                const priceA = parseFloat(a.getAttribute('data-price'));
                const priceB = parseFloat(b.getAttribute('data-price'));
                return priceB - priceA;
            });
        } else if (selectedValue === 'l2h') {
            items.sort((a, b) => {
                const priceA = parseFloat(a.getAttribute('data-price'));
                const priceB = parseFloat(b.getAttribute('data-price'));
                return priceA - priceB;
            });
        }

        // Append sorted items back to the container
        items.forEach(item => itemContainer.appendChild(item));
    });
});