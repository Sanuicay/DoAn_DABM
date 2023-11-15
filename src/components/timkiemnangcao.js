import '../styles/timkiemnangcao.css'
function Timkiemnangcao() {
    return (
        <div class = "tknc_main">
            <form>
                <div class = "container">
                    <label class = "tensach">
                        <h1>Tên sách</h1>
                        
                        <input class = "input_chung" type = "text" placeholder="Đất rừng phương nam"/>
                    </label>
                </div>
                
                <div class = "tg-tl">
                    <div>
                        <label>
                            <h1>Tác giả</h1>
                            <input class = "input_tg-tl" type = "text" placeholder="Đoàn Giỏi"/>
                        </label>
                    </div>
                    <div>
                        <label>
                            <h1>Thể loại</h1>
    
                            <select class="dropdown">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </label>
                    </div>
                   
                </div>

                <div class = "container">
                    <label>
                        <h1>Nhà xuất bản</h1>
                        
                        <input class = "input_chung" type = "text" placeholder="NXB Kim Đồng"/>
                    </label>
                </div>
               
               <div class = "container">
                <label>
                        <h1>Nhà cung cấp</h1>
                        <input class = "input_chung" type = "text" placeholder="Nhà sách Fahasa"/>
                    </label>
               </div>
                
                <div class>
                    <label>
                        <h1>Mức giá</h1>
                        <div class = "mucgia_con">
                            <input class = "input_gia" type = "text" placeholder="Từ"/>
                            <h1> - </h1>
                            <input class = "input_gia" type = "text" placeholder="Đến"/>
                        </div>
                      
                    </label>
                </div>
                
                <div >
                    <label>
                        <h1>Loại bìa</h1>
                        <div class = "loaibia_con">
                            <div>
                                <input class = "checkbox" type = "checkbox" />Bìa cứng
                            </div>

                            <div>
                                <input class = "checkbox" type = "checkbox" />Bìa mềm
                            </div>

                            <div>
                                <input class = "checkbox" type = "checkbox" />Boxset
                            </div>

                            <div>
                                <input class = "checkbox" type = "checkbox" />Bìa gập 
                            </div>
                        </div>
                       
                    </label>
                </div>

                <div class = "timkiem">
                    <button>Tìm kiếm</button>
                </div>
                
            </form>
        </div>
    )
}
export default Timkiemnangcao