let availableKeywords = [
    '300 bài code thiếu nhi',
    'Bí kíp tán gái đại cương',
    'Đất rừng phương nam',
    'Học tốt Giải tích 2',
    'Cách đi ngủ cũng có tiền',
    'Hạt giống tâm hồn',
    'Harry Bọt Bèo và Hòn đá phù mỏ',
    'Mắt biếc',
    'Kính Vạn Hoa',
    'Nghệ thuật Origami',
];

const resultsBox = document.querySelector(".result-box")
const inputBox = document.getElementById("input-box")

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
}

function display(result){
    const content = result.map((list)=>{
        return "<lt>" + list + "</lt>"
    });

    resultsBox.innerHTML = "<ul>" + content + "</ul> ";
}