import Image from "next/image";
import NextLink from "next/link";

export default function Header() {
    return <>
    <div id="header">
        <nav className="navbar">
            
            <NextLink className="navbar-brand icon-home" href="/">
                <svg width="109" height="40" viewBox="0 0 109 40" fill="none" >
                    <g clip-path="url(#clip0_42309_360)">
                        <path d="M15.8646 11.5165H25.3419V19.313H28.9509V0.0280151H25.3419V8.15522H15.8646V0.0280151H12.228V19.313H15.8646V11.5165Z" fill="#FF963C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M37.6932 19.6436C39.7593 19.6436 42.1011 18.9273 43.5338 17.4395L41.3847 15.3182C40.6133 16.1173 38.988 16.5855 37.7482 16.5855C35.3789 16.5855 33.9188 15.3735 33.6983 13.6928H44.3051C44.8286 8.10019 41.9909 5.29001 37.4451 5.29001C33.0372 5.29001 30.227 8.26547 30.227 12.3979C30.227 16.7508 33.0096 19.6436 37.6932 19.6436ZM37.5552 8.26547C39.4838 8.26547 40.8614 9.14706 41.0816 10.9102H33.7535C34.2493 9.14707 35.7371 8.26547 37.5552 8.26547H37.5552Z" fill="#FF963C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M52.8958 19.6983C54.4111 19.6708 56.5324 18.8992 57.3039 17.3014L57.4692 19.2851H60.6374V5.70281H57.414L57.3039 7.57622C56.5324 6.22624 54.7968 5.37224 52.9786 5.37224C49.0113 5.34465 45.898 7.79668 45.898 12.4801C45.898 17.2461 48.8736 19.7259 52.8958 19.6983L52.8958 19.6983ZM53.2815 8.37518C58.5711 8.37518 58.5711 16.6125 53.2815 16.6125C51.0499 16.6125 49.2592 15.0699 49.2592 12.4802C49.2592 9.89044 51.0499 8.37518 53.2815 8.37518Z" fill="#FF963C"/>
                        <rect x="63.0323" y="0.0275879" width="3.33355" height="19.2575" fill="#FF963C"/>
                        <path d="M82.6182 12.3424C82.6182 10.3037 83.9955 8.62317 85.9792 8.62317C87.7701 8.62317 89.0649 9.67017 89.0649 12.1495V19.285H92.4261V12.1221C92.4261 8.12733 90.718 5.51014 86.8608 5.51014C85.3181 5.51014 83.8304 5.9784 82.6182 7.54871V0H79.257V19.285H82.6182V12.3424Z" fill="#FF963C"/>
                        <path d="M70.8417 14.491C70.8417 17.8798 72.7702 19.5602 75.7179 19.4501C76.7374 19.4225 77.5363 19.2572 78.5006 18.8715L77.5638 16.0062C77.068 16.2543 76.4618 16.4196 75.9384 16.4196C74.8915 16.4196 74.1752 15.7859 74.1752 14.491V8.62283H77.9496V5.73013H74.2028V2.418H70.8417V5.73013H68.307V8.62283H70.8417L70.8417 14.491Z" fill="#FF963C"/>
                        <path d="M105.449 5.37201L101.771 13.6346L98.1082 5.37201H94.5596L99.9926 17.6288L92.3602 34.7745L79.0009 23.434L0 23.4407V26.5777L77.775 26.5792L93.5334 39.9999L109 5.37201H105.449Z" fill="#FF963C"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_42309_360">
                            <rect width="109" height="39.9999" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </NextLink>
            <div className="icon-header">
                <a href="#" className="icon-url">
                <Image
                    src="/icons/icon_memo.png"
                    alt="Next.js Logo"
                    width={27}
                    height={26}
                    priority
                />
                <span> 自分の記録</span>
                </a>
                <a href="#" className="icon-url">
                    <Image
                        src="/icons/icon_challenge.png"
                        alt="Next.js Logo"
                        width={27}
                        height={26}
                        priority
                    />
                    <span> チャレンジ</span>
                </a>

                <a href="#" className="icon-url">
                    <Image
                        src="/icons/icon_info.png"
                        alt="Next.js Logo"
                        width={27}
                        height={26}
                        priority
                    />
                    <span> お知らせ</span>
                </a>

                <a href="#" className="icon-url">
                    <Image
                        src="/icons/icon_menu.png"
                        alt="Next.js Logo"
                        width={27}
                        height={26}
                        priority
                    />
                </a>
            </div>
        </nav>
    </div>
    </>
}