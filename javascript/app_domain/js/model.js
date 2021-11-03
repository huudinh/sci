// let url = 'https://spreadsheets.google.com/feeds/list/1plIfCKdWwHAH9SGa2zOuC4irRNdQEhLSANkNY52UZwM/od6/public/values?alt=json';
let domain = {};
let ip = [];
let trangQL = [];
let note = [];

async function getAPI() {
    const spreadsheetId = '1plIfCKdWwHAH9SGa2zOuC4irRNdQEhLSANkNY52UZwM'
    fetch(`https://docs.google.com/spreadsheets/d/${spreadsheetId}/gviz/tq?tqx=out:json`)
    .then(res => res.text())
    .then(text => {
            const json = JSON.parse(text.substr(47).slice(0, -2))
            data = json.table.rows;
            // console.log(data);

            showList(data);
            showFilter(data);
            checkExpired(data);
            checkSSL(data);

        });

}
function showList(data) {
    for (let i = 0; i < data.length; i++) {
        let list = data[i];
        // console.log(list);
        if(list.c[0]) domain.name = list.c[0].v; else domain.name = ''; 
        if(list.c[1]) domain.dayReg = list.c[1].f; else domain.dayReg = ''; 
        if(list.c[2]) domain.dayEnd = list.c[2].f; else domain.dayEnd = ''; 
        if(list.c[3]) domain.dayCount = list.c[3].v; else domain.dayCount = ''; 
        if(list.c[4]) domain.brand = list.c[4].v; else domain.brand = ''; 
        if(list.c[5]) domain.ip = list.c[5].v; else domain.ip = ''; 
        if(list.c[6]) domain.person = list.c[6].v; else domain.person = ''; 
        if(list.c[7]) domain.address = list.c[7].v; else domain.address = ''; 
        if(list.c[8]) domain.phone = list.c[8].v; else domain.phone = ''; 
        if(list.c[9]) domain.email = list.c[9].v; else domain.email = ''; 
        if(list.c[10]) domain.trangql = list.c[10].v; else domain.trangql = ''; 
        if(list.c[11]) domain.note = list.c[11].v; else domain.note = '';
        if(list.c[13]) domain.ssl = list.c[13].v; else domain.ssl = '';

        // Xử lý null
        if(list.c[13].v == null) domain.ssl = '';

        let stt = i + 1;
        tempListProd(stt, domain);

        //Show IP Filter
        if(domain.ip != ''){
            ip.push(domain.ip);
        }
        
        //Show IP Filter
        if(domain.trangql != ''){
            trangQL.push(domain.trangql);
        }
        
        //Show Note Filter
        if(domain.note != ''){
            note.push(domain.note);
        }
        
    }
    showIP(ip);  
    showTrangQL(trangQL); 
    showNote(note);

}
//Template List Product
function tempListProd(stt, domain) {
    listPost.insertAdjacentHTML('beforeend', `
        <tr>
            <td>${stt}</td>
            <td>${domain.name}</td>
            <td>${domain.dayReg}</td>
            <td>${domain.dayEnd}</td>
            <td>${domain.dayCount}</td>
            <td>${domain.brand}</td>
            <td>${domain.ip}</td>
            <td>${domain.person}</td>
            <td>${domain.address}</td>
            <td>${domain.phone}</td>
            <td>${domain.email}</td>
            <td>${domain.trangql}</td>
            <td>${domain.note}</td>
            <td>${domain.ssl}</td>
        </tr>        
    `);
}
//Filter Domain
function showFilter(data) {
    document.getElementById('searchBtn').addEventListener('click', () => {
        const search_name = document.getElementById('search_name').value;
        const search_ip = document.getElementById('search_ip').value;
        const search_type = document.getElementById('search_type').value;
        const search_brand = document.getElementById('search_brand').value;
        const search_date = document.getElementById('search_date').value;
        const search_trangql = document.getElementById('search_trangql').value;
        const search_note = document.getElementById('search_note').value;
        const listPost = document.getElementById('listPost');
        listPost.innerHTML = '';
        let stt = 1;

        for (let i = 0; i < data.length; i++) {
            let list = data[i];
            // console.log(list);
            if(list.c[0]) domain.name = list.c[0].v; else domain.name = ''; 
            if(list.c[1]) domain.dayReg = list.c[1].f; else domain.dayReg = ''; 
            if(list.c[2]) domain.dayEnd = list.c[2].f; else domain.dayEnd = ''; 
            if(list.c[3]) domain.dayCount = list.c[3].v; else domain.dayCount = ''; 
            if(list.c[4]) domain.brand = list.c[4].v; else domain.brand = ''; 
            if(list.c[5]) domain.ip = list.c[5].v; else domain.ip = ''; 
            if(list.c[6]) domain.person = list.c[6].v; else domain.person = ''; 
            if(list.c[7]) domain.address = list.c[7].v; else domain.address = ''; 
            if(list.c[8]) domain.phone = list.c[8].v; else domain.phone = ''; 
            if(list.c[9]) domain.email = list.c[9].v; else domain.email = ''; 
            if(list.c[10]) domain.trangql = list.c[10].v; else domain.trangql = ''; 
            if(list.c[11]) domain.note = list.c[11].v; else domain.note = '';
            if(list.c[13]) domain.ssl = list.c[13].v; else domain.ssl = '';

            // Xử lý null
            if(list.c[13].v == null) domain.ssl = '';

            if (
                (domain.name.toLocaleLowerCase()).includes(search_name.toLocaleLowerCase()) &&
                (domain.ip.toLocaleLowerCase()).includes(search_ip.toLocaleLowerCase())  &&
                (domain.name.includes(search_type)) &&
                (domain.brand.includes(search_brand)) &&
                (domain.trangql.includes(search_trangql)) &&                
                (domain.note.includes(search_note)) &&                
                (Number(domain.dayCount) <= Number(search_date)) 
                ) {
                    stt++;
                    tempListProd(stt, domain);
            }
        }
    });
}

// Check Domain Expired
function checkExpired(data) {
    let count = 0;
    for (let i = 0; i < data.length; i++) {
        let list = data[i];
        if(list.c[3]) domain.dayCount = list.c[3].v; else domain.dayCount = ''; 
        if ( Number(domain.dayCount) <= 10 ) {
            count++;
        }
    }
  
    if (count > 0){
        document.getElementById('domain_title').insertAdjacentHTML('AfterEnd', ` <div id="notification" class="notification" title="Xem danh xách các tên miền còn hạn sử dụng dưới 10 ngày">Có <b>${count}</b> tên miền sắp hết hạn <span>[click để xem]</span></div>`)
    }

    document.getElementById('notification').addEventListener('click', () => {
        const listPost = document.getElementById('listPost');
        listPost.innerHTML = '';
        let stt = 0;

        for (let i = 0; i < data.length; i++) {
            let list = data[i];
            if(list.c[0]) domain.name = list.c[0].v; else domain.name = ''; 
            if(list.c[1]) domain.dayReg = list.c[1].f; else domain.dayReg = ''; 
            if(list.c[2]) domain.dayEnd = list.c[2].f; else domain.dayEnd = ''; 
            if(list.c[3]) domain.dayCount = list.c[3].v; else domain.dayCount = ''; 
            if(list.c[4]) domain.brand = list.c[4].v; else domain.brand = ''; 
            if(list.c[5]) domain.ip = list.c[5].v; else domain.ip = ''; 
            if(list.c[6]) domain.person = list.c[6].v; else domain.person = ''; 
            if(list.c[7]) domain.address = list.c[7].v; else domain.address = ''; 
            if(list.c[8]) domain.phone = list.c[8].v; else domain.phone = ''; 
            if(list.c[9]) domain.email = list.c[9].v; else domain.email = ''; 
            if(list.c[10]) domain.trangql = list.c[10].v; else domain.trangql = ''; 
            if(list.c[11]) domain.note = list.c[11].v; else domain.note = '';
            if(list.c[13]) domain.ssl = list.c[13].v; else domain.ssl = '';

            // Xử lý null
            if(list.c[13].v == null) domain.ssl = ''; 

            if ( Number(domain.dayCount) <= 10 ) {
                stt++;
                tempListProd(stt, domain);
            }
        }        
    });
}
// Check SSL Expired
function checkSSL(data) {
    let count = 0;
    for (let i = 0; i < data.length; i++) {
        let list = data[i];

        if ( (Number(list.c[13].v) <= 10) && (list.c[13].v != null) ) {
            count++;
        }
    }
  
    if (count > 0){
        document.getElementById('domain_title').insertAdjacentHTML('AfterEnd', ` <div id="notification" class="notification" title="Xem danh xách các tên miền có SSL còn hạn sử dụng dưới 10 ngày">Có <b>${count}</b> tên miền có SSL sắp hết hạn <span>[click để xem]</span></div>`)
    }

    document.getElementById('notification').addEventListener('click', () => {
        const listPost = document.getElementById('listPost');
        listPost.innerHTML = '';
        let stt = 0;

        for (let i = 0; i < data.length; i++) {
            let list = data[i];
            if(list.c[0]) domain.name = list.c[0].v; else domain.name = ''; 
            if(list.c[1]) domain.dayReg = list.c[1].f; else domain.dayReg = ''; 
            if(list.c[2]) domain.dayEnd = list.c[2].f; else domain.dayEnd = ''; 
            if(list.c[3]) domain.dayCount = list.c[3].v; else domain.dayCount = ''; 
            if(list.c[4]) domain.brand = list.c[4].v; else domain.brand = ''; 
            if(list.c[5]) domain.ip = list.c[5].v; else domain.ip = ''; 
            if(list.c[6]) domain.person = list.c[6].v; else domain.person = ''; 
            if(list.c[7]) domain.address = list.c[7].v; else domain.address = ''; 
            if(list.c[8]) domain.phone = list.c[8].v; else domain.phone = ''; 
            if(list.c[9]) domain.email = list.c[9].v; else domain.email = ''; 
            if(list.c[10]) domain.trangql = list.c[10].v; else domain.trangql = ''; 
            if(list.c[11]) domain.note = list.c[11].v; else domain.note = '';
            if(list.c[13]) domain.ssl = list.c[13].v; else domain.ssl = '';

            // Xử lý null
            if(list.c[13].v == null) domain.ssl = ''; 

            if ( (Number(list.c[13].v) <= 10) && (list.c[13].v != null) ) {
                stt++;
                tempListProd(stt, domain);
            }
        }        
    });
}

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

// Check loai bo phan tu trung lap cua mang
function itemDouble(arr) {
    let arrNew = [];
    arr.forEach((c) =>{
        if (!arrNew.includes(c)){
            arrNew.push(c);
        }
    });
    return arrNew;
}

//Show IP
function showIP(ip){
    let listIP = itemDouble(ip).sort();
    
    for(let item in listIP){
        document.getElementById('search_ip').insertAdjacentHTML('beforeend',`
            <option value="${listIP[item]}"> ${listIP[item]} </option>
        `);
    }
}
//Show Type Domain
function showType(data){
    for(let item in data){
        document.getElementById('search_type').insertAdjacentHTML('beforeend',`
            <option value="${data[item]}"> ${data[item]} </option>
        `);
    }
}
//Show Brand
function showBrand(data){
    for(let item in data){
        document.getElementById('search_brand').insertAdjacentHTML('beforeend',`
            <option value="${data[item]}"> ${data[item]} </option>
        `);
    }
}
//Show Day
function showDate(data){
    for(let item in data){
        document.getElementById('search_date').insertAdjacentHTML('beforeend',`
            <option value="${data[item]}"> ${data[item]} Ngày</option>
        `);
    }
}
//Show Trang QL
function showTrangQL(data){
    data = itemDouble(data).sort();
    for(let item in data){
        document.getElementById('search_trangql').insertAdjacentHTML('beforeend',`
            <option value="${data[item]}"> ${data[item]}</option>
        `);
    }
}
//Show Ghi chú
function showNote(data){
    data = itemDouble(data).sort();
    for(let item in data){
        document.getElementById('search_note').insertAdjacentHTML('beforeend',`
            <option value="${data[item]}"> ${data[item]}</option>
        `);
    }
}
