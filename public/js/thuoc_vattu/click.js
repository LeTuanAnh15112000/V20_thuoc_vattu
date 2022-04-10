
// phan danh muc
// click danh mục add class active
function click_danhmuc(){
    var add_active = document.querySelector('.click_danhmuc');
    add_active.classList.toggle('active')
}


function click_thuoc(){
    var add_active = document.querySelector('.click_thuoc');
    add_active.classList.toggle('active')
    var add_active1 = document.querySelector('.click_danhmuc');
    add_active1.classList.add('menu-open')
}


var add_active1 = document.querySelector('.click_danhmuc');
add_active1.classList.add('menu-open')




function click_quanlykho(){
    var add_active = document.querySelector('.click_quanlykho');
    add_active.classList.toggle('active')
}

function click_quanlynhapkho(){
    var add_active = document.querySelector('.click_quanlynhapkho');
    add_active.classList.toggle('active')
}

function click_quanlyxuatkho(){
    var add_active = document.querySelector('.click_quanlyxuatkho');
    add_active.classList.toggle('active')
}


// Thanh ký thuốc hết hạn
//     var add_active = document.querySelector('.click_thanhlythuochethan');
function click_thanhlythuochethan(){
     var add_active = document.querySelector('.click_thanhlythuochethan');

    add_active.classList.toggle('active')
    

}

function click_hethan(){
    var add_active = document.querySelector('.click_hethan');
    add_active.classList.toggle('active')
    var add_menu = document.querySelector('.click_menu_open');
    add_menu.classList.toggle('menu-open')
    
}
function click_guiyeucau(){
    var add_active = document.querySelector('.click_guiyeucau');
    add_active.classList.toggle('active')
    var add_menu = document.querySelector('.click_menu_open');
    add_menu.classList.toggle('menu-open')
    
}
// end thuoc hết hạn
function click_baocao(){
    var add_active = document.querySelector('.click_baocao');
    add_active.classList.toggle('active')
}




// click xác nhận nhập thuốc
function click_xacnhan(){
    var add_active = document.querySelector('.click_xacnhan');
    add_active.classList.toggle('active')
    add_active.classList.toggle('menu-open')
}

// click xác xuất thuốc
function click_xuat(){
    var add_active = document.querySelector('.click_xuat');
    add_active.classList.toggle('active')
    add_active.classList.toggle('menu-open')
}


// click xác xuất huy thuốc
function click_xacnhanhuythuoc(){
    var add_active = document.querySelector('.click_xacnhanhuythuoc');
    add_active.classList.toggle('active')
    add_active.classList.toggle('menu-open')
}