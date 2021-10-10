// let url = 'https://spreadsheets.google.com/feeds/list/1plIfCKdWwHAH9SGa2zOuC4irRNdQEhLSANkNY52UZwM/od6/public/values?alt=json';

async function getAPI() {
    const spreadsheetId = '1plIfCKdWwHAH9SGa2zOuC4irRNdQEhLSANkNY52UZwM'
    fetch(`https://docs.google.com/spreadsheets/d/${spreadsheetId}/gviz/tq?tqx=out:json`)
    .then(res => res.text())
    .then(text => {
            let data = [];
            let data_row = {};
            const json = JSON.parse(text.substr(47).slice(0, -2))
            // console.log(json.table.rows);
            
            for (let i = 0; i < json.table.rows.length; i++){
                let list = json.table.rows[i];
                // console.log(list);
               
                if(list.c[0]) data_row.name = list.c[0].v; else data_row.name = ''; 
                if(list.c[1]) data_row.dayReg = list.c[1].f; else data_row.dayReg = ''; 
                if(list.c[2]) data_row.dayEnd = list.c[2].f; else data_row.dayEnd = ''; 
                if(list.c[3]) data_row.dayCount = list.c[3].v; else data_row.dayCount = ''; 
                if(list.c[4]) data_row.brand = list.c[4].v; else data_row.brand = ''; 
                if(list.c[5]) data_row.ip = list.c[5].v; else data_row.ip = ''; 
                if(list.c[6]) data_row.person = list.c[6].v; else data_row.person = ''; 
                if(list.c[7]) data_row.address = list.c[7].v; else data_row.address = ''; 
                if(list.c[8]) data_row.phone = list.c[8].v; else data_row.phone = ''; 
                if(list.c[9]) data_row.email = list.c[9].v; else data_row.email = ''; 
                if(list.c[10]) data_row.trangql = list.c[10].v; else data_row.trangql = ''; 

                data[i] = data_row;
            }
            console.log(data);
            showList(data);
        });

    // const conn = await fetch(url);
    // const data = await conn.json();
    // showList(data.feed.entry);
    // showFilter(data.feed.entry);
    // checkExpired(data.feed.entry)
    // console.log(data.feed.entry);
}
function showList(data) {
    // console.log(data);
    for (let item of data) {
        let name = item.name;
        let dayReg = item.dayReg;
        let dayEnd = item.dayEnd;
        let dayCount = item.dayCount;
        let brand = item.brand;
        let ip = item.ip;
        let preson = item.person;
        let address = item.address;
        let phone = item.phone;
        let email = item.email;
        let trangql = item.trangql;
        let stt = ++item;
        tempListProd(stt,name,dayReg,dayEnd,dayCount,brand,ip,preson,address,phone,email,trangql);
    }
}
//Template List Product
// function tempListProd(stt,name,dayReg,dayEnd,dayCount,brand,ip,persion,address,phone,email,trangql) {
//     listPost.insertAdjacentHTML('beforeend', `
//         <tr>
//             <td>${stt}</td>
//             <td>${name}</td>
//             <td>${dayReg}</td>
//             <td>${dayEnd}</td>
//             <td>${dayCount}</td>
//             <td>${brand}</td>
//             <td>${ip}</td>
//             <td>${persion}</td>
//             <td>${address}</td>
//             <td>${phone}</td>
//             <td>${email}</td>
//             <td>${trangql}</td>
//         </tr>        
//     `);
// }
//Filter Domain
// function showFilter(data) {
//     document.getElementById('searchBtn').addEventListener('click', () => {
//         const search_name = document.getElementById('search_name').value;
//         const search_ip = document.getElementById('search_ip').value;
//         const search_type = document.getElementById('search_type').value;
//         const search_brand = document.getElementById('search_brand').value;
//         const search_date = document.getElementById('search_date').value;
//         const search_trangql = document.getElementById('search_trangql').value;
//         const listPost = document.getElementById('listPost');
//         listPost.innerHTML = '';
//         let stt = 0;

//         for (let item in data) {
//             let name = data[item].gsx$domain.$t;
//             let dayReg = data[item].gsx$dayreg.$t;
//             let dayEnd = data[item].gsx$dayend.$t;
//             let dayCount = data[item].gsx$daycount.$t;
//             let brand = data[item].gsx$brand.$t;
//             let ip = data[item].gsx$ip.$t;
//             let persion = data[item].gsx$persion.$t;
//             let address = data[item].gsx$address.$t;
//             let phone = data[item].gsx$phone.$t;
//             let email = data[item].gsx$email.$t;
//             let trangql = data[item].gsx$trangql.$t;

//             if (
//                 (name.toLocaleLowerCase()).includes(search_name.toLocaleLowerCase()) &&
//                 (ip.toLocaleLowerCase()).includes(search_ip.toLocaleLowerCase())  &&
//                 (name.includes(search_type)) &&
//                 (brand.includes(search_brand)) &&
//                 (trangql.includes(search_trangql)) &&                
//                 (Number(dayCount) <= Number(search_date)) 
//                 ) {
//                     stt++;
//                     tempListProd(stt,name,dayReg,dayEnd,dayCount,brand,ip,persion,address,phone,email,trangql);
//                 }
           
            
            
//         }
//     });
// }

// Check Domain Expired
// function checkExpired(data) {
//     let count = 0;
//     for (let item in data) {
//         let dayCount = data[item].gsx$daycount.$t;
//         if ( Number(dayCount) <= 10 ) {
//             count++;
//         }
//     }
//     if (count > 0){
//         document.getElementById('domain_title').insertAdjacentHTML('AfterEnd', ` <div id="notification" class="notification" title="Xem danh xách các tên miền còn hạn sử dụng dưới 10 ngày">Có <b>${count}</b> tên miền sắp hết hạn <span>[click để xem]</span></div>`)
//     }

//     document.getElementById('notification').addEventListener('click', () => {
//         const listPost = document.getElementById('listPost');
//         listPost.innerHTML = '';
//         let stt = 0;

//         for (let item in data) {
//             let name = data[item].gsx$domain.$t;
//             let dayReg = data[item].gsx$dayreg.$t;
//             let dayEnd = data[item].gsx$dayend.$t;
//             let dayCount = data[item].gsx$daycount.$t;
//             let brand = data[item].gsx$brand.$t;
//             let ip = data[item].gsx$ip.$t;
//             let persion = data[item].gsx$persion.$t;
//             let address = data[item].gsx$address.$t;
//             let phone = data[item].gsx$phone.$t;
//             let email = data[item].gsx$email.$t;
//             let trangql = data[item].gsx$trangql.$t;

//             if ( Number(dayCount) <= 10 ) {
//                     stt++;
//                     tempListProd(stt,name,dayReg,dayEnd,dayCount,brand,ip,persion,address,phone,email,trangql);
//                 }
//         }
//     });
// }

// Get Info Brand
// async function getAPIbrand(search_brand) {
//     const conn = await fetch(url);
//     const data = await conn.json();
//     showListBrand(data.feed.entry,search_brand);
//     showFilterBrand(data.feed.entry,search_brand);
//     console.log(data.feed.entry);
// }
// function showListBrand(data,search_brand) {
//     // console.log(data);
//     let stt = 0;
//     for (let item in data) {
//         let name = data[item].gsx$domain.$t;
//         let dayReg = data[item].gsx$dayreg.$t;
//         let dayEnd = data[item].gsx$dayend.$t;
//         let dayCount = data[item].gsx$daycount.$t;
//         let brand = data[item].gsx$brand.$t;
//         let ip = data[item].gsx$ip.$t;
//         let persion = data[item].gsx$persion.$t;
//         let address = data[item].gsx$address.$t;
//         let phone = data[item].gsx$phone.$t;
//         let email = data[item].gsx$email.$t;
//         if(brand.includes(search_brand)){
//             stt++;
//             tempListProdBrand(stt,name,dayReg,dayEnd,dayCount,brand,ip);
//         }
//     }
// }
//Template List Product
// function tempListProdBrand(stt,name,dayReg,dayEnd,dayCount,brand,ip) {
//     listPost.insertAdjacentHTML('beforeend', `
//         <tr>
//             <td>${stt}</td>
//             <td>${name}</td>
//             <td>${dayReg}</td>
//             <td>${dayEnd}</td>
//             <td>${dayCount}</td>
//             <td>${brand}</td>
//             <td>${ip}</td>
//         </tr>        
//     `);
// }
//Filter Domain
// function showFilterBrand(data,search_brand) {
//     document.getElementById('searchBtn').addEventListener('click', () => {
//         const search_name = document.getElementById('search_name').value;
//         const search_ip = document.getElementById('search_ip').value;
//         const search_type = document.getElementById('search_type').value;
//         const search_date = document.getElementById('search_date').value;        
//         const listPost = document.getElementById('listPost');
//         listPost.innerHTML = '';
//         let stt = 0;

//         for (let item in data) {
//             let name = data[item].gsx$domain.$t;
//             let dayReg = data[item].gsx$dayreg.$t;
//             let dayEnd = data[item].gsx$dayend.$t;
//             let dayCount = data[item].gsx$daycount.$t;
//             let brand = data[item].gsx$brand.$t;            
//             let ip = data[item].gsx$ip.$t;
//             let persion = data[item].gsx$persion.$t;
//             let address = data[item].gsx$address.$t;
//             let phone = data[item].gsx$phone.$t;
//             let email = data[item].gsx$email.$t;

//             if (
//                 (name.toLocaleLowerCase()).includes(search_name.toLocaleLowerCase()) &&
//                 (ip.toLocaleLowerCase()).includes(search_ip.toLocaleLowerCase())  &&
//                 (name.includes(search_type)) &&
//                 (brand.includes(search_brand)) &&
//                 (Number(dayCount) <= Number(search_date)) 
//                 ) {
//                     stt++;
//                     tempListProdBrand(stt,name,dayReg,dayEnd,dayCount,brand,ip);
//                 }
//         }
//     });
// }

// Get Info to Form

//Show IP
// function showIP(data){
//     for(let item in data){
//         document.getElementById('search_ip').insertAdjacentHTML('beforeend',`
//             <option value="${data[item]}"> ${data[item]} </option>
//         `);
//     }
// }

//Show Type Domain
// function showType(data){
//     for(let item in data){
//         document.getElementById('search_type').insertAdjacentHTML('beforeend',`
//             <option value="${data[item]}"> ${data[item]} </option>
//         `);
//     }
// }
//Show Brand
// function showBrand(data){
//     for(let item in data){
//         document.getElementById('search_brand').insertAdjacentHTML('beforeend',`
//             <option value="${data[item]}"> ${data[item]} </option>
//         `);
//     }
// }
//Show Day
// function showDate(data){
//     for(let item in data){
//         document.getElementById('search_date').insertAdjacentHTML('beforeend',`
//             <option value="${data[item]}"> ${data[item]} Ngày</option>
//         `);
//     }
// }
//Show Trang QL
// function showTrangQL(data){
//     for(let item in data){
//         document.getElementById('search_trangql').insertAdjacentHTML('beforeend',`
//             <option value="${data[item]}"> ${data[item]}</option>
//         `);
//     }
// }
