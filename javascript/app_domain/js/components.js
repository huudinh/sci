const components = {};

components.login = `
    <div class="login">
        <form id="login-form">
            <label for="usrname">Email</label>
            <input type="email" name="email">
            <label for="psw">Mật Khẩu</label>
            <input type="password" name="password">

            <input type="submit"  value="Đăng nhập">
        </form>
    </div>
`;

components.mainScreen1 = `
    <div class="main domain">
        <div class="userLogin">
            Xin chào bạn 
            <span id="user"></span> - 
            <span id="userLogout" class="userLogout">Đăng xuất</span> <br> 
            <span id="userAdmin" class="userAdmin">[Sửa thông tin]</span>
        </div>
        <h2 id="domain_title">Danh sách tên miền </h2>
       
        <div class="search">
            <input id="search_name" class="search_name" type="text" placeholder="Tìm theo tên">
            <select id="search_ip" class="search_ip">
                <option value="">Tìm theo IP</option>
            </select>            
            <select id="search_type" class="search_type">
                <option value="">Loại</option>
            </select>            
            <select id="search_brand" class="search_brand">
                <option value="">Thương hiệu</option>
            </select>
            <select id="search_date" class="search_date">
                <option value="3600">Tất cả</option>
            </select>
            <select id="search_trangql" class="search_date">
                <option value="">Trang QL</option>
            </select>
            <button type="submit" id="searchBtn">Tìm kiếm</button>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Domain</th>
                <th>Ngày đăng ký</th>
                <th>Ngày hết hạn</th>
                <th>Ngày còn lại</th>
                <th>Thương hiệu</th>
                <th>Hosting - IP</th>
                <th>Người đăng ký</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Trang QL</th>
            </tr>
            <tbody id="listPost"></tbody>
        </table>
    </div>
`;

components.mainScreen2 = `
    <div class="main domain">
        <div class="userLogin">Xin chào bạn <span id="user"></span> - <span id="userLogout" class="userLogout">Đăng xuất</span></div>
        <h1>Chao mung ban den voi SCI MKT KANGNAM</h1>
        <h2>Danh sách tên miền </h2>
        <div class="search">
            <input id="search_name" class="search_name" type="text" placeholder="Tìm theo tên">
            <select id="search_ip" class="search_ip">
                <option value="">Tìm theo IP</option>
            </select>            
            <select id="search_type" class="search_type">
                <option value="">Loại</option>
            </select>            
            <select id="search_date" class="search_date">
                <option value="3600">Tất cả</option>
            </select>
            <button type="submit" id="searchBtn">Tìm kiếm</button>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Domain</th>
                <th>Ngày đăng ký</th>
                <th>Ngày hết hạn</th>
                <th>Ngày còn lại</th>
                <th>Thương hiệu</th>
                <th>Hosting - IP</th>
            </tr>
            <tbody id="listPost"></tbody>
        </table>
    </div>
`;

components.mainScreen3 = `
    <div class="main domain">
        <div class="userLogin">Xin chào bạn <span id="user"></span> - <span id="userLogout" class="userLogout">Đăng xuất</span></div>
        <h1>Chao mung ban den voi SCI MKT DONG A</h1>
        <h2>Danh sách tên miền </h2>
        <div class="search">
            <input id="search_name" class="search_name" type="text" placeholder="Tìm theo tên">
            <select id="search_ip" class="search_ip">
                <option value="">Tìm theo IP</option>
            </select>            
            <select id="search_type" class="search_type">
                <option value="">Loại</option>
            </select>            
            <select id="search_date" class="search_date">
                <option value="3600">Tất cả</option>
            </select>
            <button type="submit" id="searchBtn">Tìm kiếm</button>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Domain</th>
                <th>Ngày đăng ký</th>
                <th>Ngày hết hạn</th>
                <th>Ngày còn lại</th>
                <th>Thương hiệu</th>
                <th>Hosting - IP</th>
            </tr>
            <tbody id="listPost"></tbody>
        </table>        
    </div>
`;

components.mainScreen4 = `
    <div class="main domain">
        <div class="userLogin">Xin chào bạn <span id="user"></span> - <span id="userLogout" class="userLogout">Đăng xuất</span></div>
        <h1>Chao mung ban den voi SCI MKT PARIS</h1>
        <h2>Danh sách tên miền </h2>
        <div class="search">
            <input id="search_name" class="search_name" type="text" placeholder="Tìm theo tên">
            <select id="search_ip" class="search_ip">
                <option value="">Tìm theo IP</option>
            </select>            
            <select id="search_type" class="search_type">
                <option value="">Loại</option>
            </select>            
            <select id="search_date" class="search_date">
                <option value="3600">Tất cả</option>
            </select>
            <button type="submit" id="searchBtn">Tìm kiếm</button>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Domain</th>
                <th>Ngày đăng ký</th>
                <th>Ngày hết hạn</th>
                <th>Ngày còn lại</th>
                <th>Thương hiệu</th>
                <th>Hosting - IP</th>
            </tr>
            <tbody id="listPost"></tbody>
        </table>
    </div>
`;

components.mainScreen5 = `
    <div class="main domain">
        <div class="userLogin">Xin chào bạn <span id="user"></span> - <span id="userLogout" class="userLogout">Đăng xuất</span></div>
        <h1>Chao mung ban den voi SCI MKT Hồng Hà</h1>
        <h2>Danh sách tên miền </h2>
        <div class="search">
            <input id="search_name" class="search_name" type="text" placeholder="Tìm theo tên">
            <select id="search_ip" class="search_ip">
                <option value="">Tìm theo IP</option>
            </select>            
            <select id="search_type" class="search_type">
                <option value="">Loại</option>
            </select>            
            <select id="search_date" class="search_date">
                <option value="3600">Tất cả</option>
            </select>
            <button type="submit" id="searchBtn">Tìm kiếm</button>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Domain</th>
                <th>Ngày đăng ký</th>
                <th>Ngày hết hạn</th>
                <th>Ngày còn lại</th>
                <th>Thương hiệu</th>
                <th>Hosting - IP</th>
            </tr>
            <tbody id="listPost"></tbody>
        </table>
    </div>
`;

components.mainScreen6 = `
    <div class="main domain">
        <div class="userLogin">Xin chào bạn <span id="user"></span> - <span id="userLogout" class="userLogout">Đăng xuất</span></div>
        <h1>Chao mung ban den voi SCI MKT Học Viện</h1>
        <h2>Danh sách tên miền </h2>
        <div class="search">
            <input id="search_name" class="search_name" type="text" placeholder="Tìm theo tên">
            <select id="search_ip" class="search_ip">
                <option value="">Tìm theo IP</option>
            </select>            
            <select id="search_type" class="search_type">
                <option value="">Loại</option>
            </select>            
            <select id="search_date" class="search_date">
                <option value="3600">Tất cả</option>
            </select>
            <button type="submit" id="searchBtn">Tìm kiếm</button>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Domain</th>
                <th>Ngày đăng ký</th>
                <th>Ngày hết hạn</th>
                <th>Ngày còn lại</th>
                <th>Thương hiệu</th>
                <th>Hosting - IP</th>
            </tr>
            <tbody id="listPost"></tbody>
        </table>
    </div>
`;

components.mainScreen7 = `
    <div class="main domain">
        <div class="userLogin">Xin chào bạn <span id="user"></span> - <span id="userLogout" class="userLogout">Đăng xuất</span></div>
        <h1>Chao mung ban den voi SCI MKT Richard Huy</h1>
        <h2>Danh sách tên miền </h2>
        <div class="search">
            <input id="search_name" class="search_name" type="text" placeholder="Tìm theo tên">
            <select id="search_ip" class="search_ip">
                <option value="">Tìm theo IP</option>
            </select>            
            <select id="search_type" class="search_type">
                <option value="">Loại</option>
            </select>            
            <select id="search_date" class="search_date">
                <option value="3600">Tất cả</option>
            </select>
            <button type="submit" id="searchBtn">Tìm kiếm</button>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Domain</th>
                <th>Ngày đăng ký</th>
                <th>Ngày hết hạn</th>
                <th>Ngày còn lại</th>
                <th>Thương hiệu</th>
                <th>Hosting - IP</th>
            </tr>
            <tbody id="listPost"></tbody>
        </table>
    </div>
`;

components.adminMain = `
    <div class="main domain">
        <div class="userLogin">
            Xin chào bạn 
            <span id="user"></span> - 
            <span id="userLogout" class="userLogout">Đăng xuất</span> - 
            <span id="userAdmin" class="userAdmin">[Sửa thông tin]</span>
            <span id="viewAdmin" class="viewAdmin">[Xem lại]</span>
        </div>
        <div id="adminMain" class="adminMain">
            <iframe src="https://docs.google.com/spreadsheets/d/1plIfCKdWwHAH9SGa2zOuC4irRNdQEhLSANkNY52UZwM/edit?usp=sharing" title="W3Schools Free Online Web Tutorials"></iframe>
        </div>   
    </div>
`;