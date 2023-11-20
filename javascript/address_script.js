function showForm() {
    document.getElementById('addressForm').style.display = 'block';
}

function addAddress() {
    var newAddress = document.getElementById('newAddress').value;
    var addressesDiv = document.getElementById('addresses');
    var newAddressDiv = document.createElement('div');
    newAddressDiv.className = 'address';
    newAddressDiv.innerHTML = '<div class="details">' + newAddress + '</div><div class="button"><a href="#"><button>Cập Nhật</button></a><a href="#"><button>Xóa</button></a></div>';
    addressesDiv.appendChild(newAddressDiv);
    document.getElementById('newAddress').value = '';
    document.getElementById('addressForm').style.display = 'none';
}