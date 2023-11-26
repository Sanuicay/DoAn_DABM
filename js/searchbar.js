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

function findBookID(bookName) {
  const bookObject = bookArray.find(book => book.book_name === bookName);
  console.log(bookObject.book_ID);
}

findBookID('Tiếng Việt 1 (Tập 1)');
