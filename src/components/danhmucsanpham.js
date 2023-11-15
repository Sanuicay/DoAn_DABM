import vanhoc from "../images/vanhoc.jpeg"
import sachthieunhi from "../images/sachthieunhi.jpg"
import thamkhao from "../images/sachthamkhao.jpg"
import triethoc from "../images/triethoc.jpg"
import { useState } from "react"
import "../styles/danhmucsanpham.css"
function Danhmucsp() {
    const danhMuc = [
        {
            "id": sachthieunhi,
            "name": "SÁCH THIẾU NHI"
        },
        {
            "id": vanhoc,
            "name": "VĂN HỌC"
        },
        {
            "id": thamkhao,
            "name": "SÁCH GIÁO KHOA - THAM KHẢO"
        }
    ]
    const danhMucBest = [
        {
            "id": triethoc,
            "name": "Giáo trình Triết học Mác - Lênin",
            "category": "Sách khoa học viễn tưởng",
            "default_price": "70000",
            "final_price": "69000"
        },
        {
            "id": triethoc,
            "name": "Giáo trình Triết học Mác - Lênin",
            "category": "Sách khoa học viễn tưởng",
            "default_price": "70000",
            "final_price": "69000"
        },
        {
            "id": triethoc,
            "name": "Giáo trình Triết học Mác - Lênin",
            "category": "Sách khoa học viễn tưởng",
            "default_price": "70000",
            "final_price": "69000"
        },
        {
            "id": triethoc,
            "name": "Giáo trình Triết học Mác - Lênin",
            "category": "Sách khoa học viễn tưởng",
            "default_price": "70000",
            "final_price": "69000"
        },
        {
            "id": triethoc,
            "name": "Giáo trình Triết học Mác - Lênin",
            "category": "Sách khoa học viễn tưởng",
            "default_price": "70000",
            "final_price": "69000"
        },
        {
            "id": triethoc,
            "name": "Giáo trình Triết học Mác - Lênin",
            "category": "Sách khoa học viễn tưởng",
            "default_price": "70000",
            "final_price": "69000"
        },
        {
            "id": triethoc,
            "name": "Giáo trình Triết học Mác - Lênin",
            "category": "Sách khoa học viễn tưởng",
            "default_price": "70000",
            "final_price": "69000"
        },
        {
            "id": triethoc,
            "name": "Giáo trình Triết học Mác - Lênin",
            "category": "Sách khoa học viễn tưởng",
            "default_price": "70000",
            "final_price": "69000"
        }
    ]

    const [selectedItem, setSelectedItem] = useState(null);

    const handleItemClick = (item) => {
        console.log(item);
        if (selectedItem === item) {
            setSelectedItem(null);
        }
        else {
            setSelectedItem(item);
        }

    };
    return (
        <div class="main">
            <div class="danhmucsp">
                <div>
                    <h1>Danh mục sản phẩm</h1>
                </div>
                <div>
                    <p>Tìm mua sách theo thể loại mà bạn yêu thích</p>
                </div>

                <div class="danhmuccon">
                    {
                        danhMuc.map((item) => {
                            return (
                                <div class="item" key={item.name}>
                                    <img class="image_dm" src={item.id} alt={item.name} />
                                    <span class="text_dm">{item.name}</span>
                                </div>
                            );
                        })
                    }
                </div>
            </div>

            <div class="best_seller">
                <div>
                    <h1>Tuyển tập Best Seller</h1>
                </div>

                <div class="item_best">
                    {
                        danhMucBest.map((item, index) => {
                            const itemId = `item-${index}`; // Generate a unique ID for each item

                            return (
                                <button
                                    class={`items ${selectedItem === item ? 'selected' : ''}`}
                                    id={itemId} // Assign the unique ID to the button
                                    key={item.name}
                                    onClick={() => handleItemClick(itemId)}
                                >
                                    <img class="image_best" src={item.id} alt={item.name} />
                                    <span class="ten_best">{item.name}</span>
                                    <span class="nhan_best">{item.category}</span>
                                    <div class="price">
                                        <span class="giaban_best">{item.final_price}đ</span>
                                        <span class="giagoc_best">{item.default_price}đ</span>
                                    </div>
                                    {selectedItem == itemId && (
                                        <div class="selected_item">
                                            <div class="overlay"><button class="add_to_cart">Add to Cart</button></div>


                                            {/* <div class = "three_button">
                                            <div class="button_share">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M12 10.6668C11.4747 10.6668 11 10.8735 10.644 11.2048L5.94 8.46683C5.97333 8.3135 6 8.16016 6 8.00016C6 7.84016 5.97333 7.68683 5.94 7.5335L10.64 4.7935C11 5.12683 11.4733 5.3335 12 5.3335C13.1067 5.3335 14 4.44016 14 3.3335C14 2.22683 13.1067 1.3335 12 1.3335C10.8933 1.3335 10 2.22683 10 3.3335C10 3.4935 10.0267 3.64683 10.06 3.80016L5.36 6.54016C5 6.20683 4.52667 6.00016 4 6.00016C2.89333 6.00016 2 6.8935 2 8.00016C2 9.10683 2.89333 10.0002 4 10.0002C4.52667 10.0002 5 9.7935 5.36 9.46016L10.0587 12.2055C10.0211 12.3564 10.0014 12.5113 10 12.6668C10 13.0624 10.1173 13.4491 10.3371 13.778C10.5568 14.1069 10.8692 14.3632 11.2346 14.5146C11.6001 14.666 12.0022 14.7056 12.3902 14.6284C12.7781 14.5512 13.1345 14.3607 13.4142 14.081C13.6939 13.8013 13.8844 13.445 13.9616 13.057C14.0387 12.669 13.9991 12.2669 13.8478 11.9015C13.6964 11.536 13.44 11.2237 13.1111 11.0039C12.7822 10.7841 12.3956 10.6668 12 10.6668Z" fill="white" />
                                                </svg>
                                                <p>Share</p>
                                            </div>
                                            <div class="button_compare">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M10.08 7L11.08 8L14.52 4.55L11 1L10 2L11.8 3.8H2.00004V5.2H11.82L10.08 7ZM5.86004 9L4.86004 8L1.42004 11.5L4.91004 15L5.91004 14L4.10004 12.2H14V10.8H4.10004L5.86004 9Z" fill="white" />
                                                </svg>
                                                <p>Compare</p>
                                            </div>
                                            <div class="button_like">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M7.99973 14.0359C-5.33333 6.66644 3.99999 -1.33355 7.99973 3.72515C12 -1.33356 21.3333 6.66644 7.99973 14.0359Z" stroke="white" stroke-width="1.8" />
                                                </svg>
                                                <p>Like</p>
                                            </div>
                                            </div> */}


                                        </div>
                                    )}
                                </button>
                            );
                        })
                    }
                </div>
            </div>

            <div class="xemthem">
                <p>Xem thêm</p>
            </div>


        </div>
    )
}
export default Danhmucsp