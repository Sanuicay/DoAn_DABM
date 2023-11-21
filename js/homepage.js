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

let availableKeywords = [
    'Tiếng Việt 1 (Tập 1)',
    'Tiếng Việt 1 (Tập 2)',
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
    let result = [];
    let input = inputBox.value;
    if (input.length) {
        result = availableKeywords.filter((keyword)=>{
            return keyword.toLowerCase().includes(input.toLowerCase());
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

function selectInput(list) {
    window.location.href = "features_product_nologin.php";
    inputBox.value = list.innerHTML;
    resultsBox.innerHTML = '';
}