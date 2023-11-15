import Header from "../components/header"
import bookstore from "../images/BOOKSTORE.png"
import Danhmucsp from "../components/danhmucsanpham"
import Footer from "../components/footer"
import "../styles/homepage.css"
import { useState } from "react"
function Homepage() {
    
    return (
        <div class = "main">
        <Header/>
        <img src ={bookstore} style={{ width: '100%', height: 'auto'}}/>
        <Danhmucsp />
        <Footer />
        </div>
    )

}

export default Homepage