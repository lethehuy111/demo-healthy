import Head from 'next/head'
import styles from '@/styles/Home.module.css'
import {buildStyles, CircularProgressbar} from 'react-circular-progressbar';
import 'react-circular-progressbar/dist/styles.css';
import React, {useEffect, useState} from "react";
import Chart from "chart.js";
import Image from "next/image";
import {ProtectRoute} from "@/services/protectedRoutes";
import ServiceApi from "@/services/sevice.api"

function TopPage() {
     const [dateAchievement, setDateAchievement] = useState([]);
     const [diets, setDiets] = useState([]);
     const [dishs, setDishs] = useState([]);
     const [page, setPage] = useState(1);
    const asyncFetchDateAchievement = async () => {
        let res = await ServiceApi.get('/date-achievement')
        if (typeof res !== 'undefined' && res.return) {
            setDateAchievement(res.result)
        }
    }
    const asyncFetchDiet = async () => {
        let res = await ServiceApi.get('/diet')
        if (typeof res !== 'undefined' && res.return) {
            setDiets(res.result)
        }
    }

    const asyncFetchHistoryHeath = async () => {
        let res = await ServiceApi.get('/history-heath')
        if (typeof res !== 'undefined' && res.return) {
            let data = res.result
            var config = {
                type: "line", data: {
                    labels: data.month,
                    backgroundColor: '#2E2E2E',
                    datasets: [{
                        label: '重さ',
                        backgroundColor: "#FFCC21",
                        borderColor: "#FFCC21",
                        data: data.weight,
                        fill: false,
                    }, {
                        label: '体脂肪',
                        fill: false,
                        backgroundColor: "#8FE9D0",
                        borderColor: "#8FE9D0",
                        data: data.body_fat_percent,
                    },],
                }, options: {
                    maintainAspectRatio: false, responsive: true, title: {
                        display: false, text: "Sales Charts", fontColor: "white",
                    }, legend: {
                        labels: {
                            fontColor: "white",
                        }, align: "end", position: "bottom",
                    }, tooltips: {
                        mode: "index", intersect: false,
                    }, hover: {
                        mode: "nearest", intersect: true,
                    }, scales: {
                        xAxes: [{
                            ticks: {
                                fontColor: "#FFFFFF",
                            }, display: true, scaleLabel: {
                                display: true, labelString: "Month", fontColor: "white",
                            }, gridLines: {
                                display: true,
                                borderDash: [2],
                                borderDashOffset: [2],
                                color: "#777777",
                                zeroLineColor: "#777777",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2],
                            },
                        },], yAxes: [{
                            ticks: {
                                fontColor: "rgba(255,255,255,.7)",
                            }, display: false, scaleLabel: {
                                display: false, labelString: "Value", fontColor: "white",
                            }, gridLines: {
                                borderDash: [3],
                                borderDashOffset: [3],
                                drawBorder: false,
                                color: "rgba(255, 255, 255, 0.15)",
                                zeroLineColor: "rgba(33, 37, 41, 0)",
                                zeroLineBorderDash: [2],
                                zeroLineBorderDashOffset: [2],
                            },
                        },],
                    },
                },
            };
            var ctx = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(ctx, config);
        }
    }
     async function asyncFetchDishs(page = 1) {
         let res = await ServiceApi.get('/diet-dish-day', {'page': page})
         if (typeof res !== 'undefined' && res.return) {
             if (page !== 1) {
                 let dataDishs = dishs
                 res.result.push(...dataDishs)
             }
             setDishs(res.result)
             let pagination = res.pagination
             setPage(pagination.current_page)
             if (pagination.current_page === pagination.last_page) {
                 document.getElementById('show-more').style.display = 'none'
             }
         }
     }
    async function loadMore() {
        let currentPage = page
        await asyncFetchDishs(++currentPage)
    }

    useEffect( () => {
            asyncFetchDateAchievement()
            asyncFetchHistoryHeath()
            asyncFetchDiet()
            asyncFetchDishs()
    }, []);
    return (<>
        <Head>
            <title>Home</title>
            <meta name="description" content="Generated by create next app"/>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link rel="icon" href="/favicon.ico"/>
        </Head>
        <main className={styles.main}>
            <div className={styles.rowCustom}>
                <div className={`col-md-5 ${styles.dateAchievement}`}>
                    <div style={{width: 200, height: 200}} className={styles.circle}>
                        { typeof dateAchievement.day !== 'undefined' && dateAchievement.rate !== 'undefined'  ?
                        <CircularProgressbar
                            value={dateAchievement.rate}
                            text={`${dateAchievement.day} ${dateAchievement.rate}%`}
                            styles={buildStyles({
                                rotation: 0.25,
                                strokeLinecap: 'butt',
                                textSize: '16px',

                                pathTransitionDuration: 0.5,

                                pathColor: `rgba(62, 152, 199, ${dateAchievement.rate / 100})`,
                                textColor: '#FFFFFF',
                                trailColor: '#FFFFFF',
                            })}
                        />
                             : (<div></div>)}
                    </div>
                </div>
                <div className="col-md-7">
                    <div
                        className={`relative flex flex-col min-w-0 break-words w-full mb-6 rounded ${styles.chart}`}>
                        <div className="rounded-t mb-0 px-4 py-3 bg-transparent">
                            <div className="flex flex-wrap items-center">

                            </div>
                        </div>
                        <div className="p-4 flex-auto">
                            {/* Chart */}
                            <div className="relative h-350-px">
                                <canvas className={styles.lineChart} id="line-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {  typeof diets !== 'undefined' && diets.length !== 0 ?
            <div className={`${styles.rowCustom}`}>
                {diets.map((diet,index) => (
                <a className={`${styles.dietDay} ${styles.colDiet}`} key={index} href="#">
                    <div className={styles.diet}>
                        <div className={styles.contentDiet}>
                            <Image
                                src={diet.icon}
                                alt="Vercel Logo"
                                width={100}
                                height={84}
                                priority
                            />
                            <p>{diet.name}</p>
                        </div>
                    </div>
                </a>
                ))}
            </div>
             : <div></div>}
            { typeof dishs !== 'undefined' && dishs.length !== 0 ?
            <div className={styles.rowCustom} style={{justifyContent: "center"}}>
                <div className={styles.detailDiet}>
                    {dishs.map((diet,index) => (
                    <a className={styles.foodDate} key={index} href="#">
                        <Image src={diet.image}
                               alt="morning"
                               width={300}
                               height={300}
                               priority/>
                        <div className={styles.foodDateTitle}>
                            <p>{diet.date} <span>{diet.diet_name}</span></p>
                        </div>
                    </a>
                    ))}
                </div>
            </div>
                : <div></div>}
            { typeof dishs !== 'undefined' && dishs.length !== 0 ?
            <div className={`${styles.rowCustom} ${styles.btnTop}`} id="show-more">
                <button className={styles.btnTopPage} onClick={loadMore}>
                    記録をもっと見る
                </button>
            </div>
            : <div></div> }
        </main>
    </>)
}
export default ProtectRoute(TopPage);