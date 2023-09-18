import Image from "next/image";
import {useEffect} from "react";

export default function Footer() {
    useEffect(() => {

    }, []);
    return <>
        <div id="footer">
            <div className="row">
                <a href="#" className="col">会員登録</a>
                <a href="#" className="col" >運営会社</a>
                <a href="#" className="col">利用規約</a>
                <a href="#" className="col">個人情報の取扱について</a>
                <a href="#" className="col" >特定商取引法に基づく表記</a>
                <a href="#" className="col">お問い合わせ</a>
            </div>
            <a id="scrollTop" href="#">
                <Image src="/icons/scroll.png"
                       alt="scrollTop"
                       width={48}
                       height={48}
                       priority/>
            </a>
        </div>
    </>
}