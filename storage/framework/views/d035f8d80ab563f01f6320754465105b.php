<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>So Smart Café</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff6b6b;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        header img {
            width: 60px;
            vertical-align: middle;
        }

        header h1 {
            display: inline;
            margin-left: 10px;
            font-size: 32px;
            vertical-align: middle;
        }

        .container {
            padding: 30px;
            max-width: 1200px;
            margin: auto;
        }

        .menu-section {
            margin-bottom: 40px;
        }

        .menu-section h2 {
            color: #3a7ca5;
            margin-bottom: 20px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        .menu-card {
            border: 1px solid #d3eafd;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(58, 124, 165, 0.1);
            background-color: #ffffff;
            text-align: center;
            transition: transform 0.2s;
        }

        .menu-card:hover {
            transform: scale(1.02);
        }

        .menu-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .menu-card h3 {
            margin: 10px 0 5px;
            color: #1f4e79;
        }

        .menu-card p {
            margin: 0;
            color: #555;
        }

        .menu-card button {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 10px 0 15px;
            border-radius: 8px;
            cursor: pointer;
        }

        .menu-card button:hover {
            background-color: #e55b5b;
        }

        #order-summary {
            border-top: 3px solid #ccc;
            margin-top: 50px;
            padding-top: 20px;
        }

        #order-list {
            list-style: none;
            padding: 0;
        }

        #order-list li {
            padding: 5px 0;
            border-bottom: 1px dashed #ccc;
        }

        #total {
            font-size: 20px;
            color: #ff6b6b;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 20px;
            text-align: center;
            margin-top: 40px;
        }

        .feature {
            background-color: #dff3ff;
            border-radius: 10px;
            padding: 15px;
            color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .feature img {
            width: 40px;
            margin-bottom: 10px;
        }

        footer {
            margin-top: 60px;
            background-color: #d3eafd;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>

<body>
    <header>
        <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" alt="logo">
        <h1>So Smart Café</h1>
    </header>
    <div class="container">
        <div id="menu"></div>
        <div id="order-summary">
            <h2>🧾 รายการที่สั่ง</h2>
            <ul id="order-list"></ul>
            <p><strong>รวมทั้งหมด: <span id="total">0</span> บาท</strong></p>
        </div>
        <div class="menu-section">
            <h2>✨ สิ่งที่ร้านเรามี</h2>
            <div class="features">
                <div class="feature">
                    <img src="https://cdn-icons-png.flaticon.com/512/481/481478.png" alt="wifi">
                    <p>Wi-Fi ฟรี</p>
                </div>
                <div class="feature">
                    <img src="https://cdn-icons-png.flaticon.com/512/3081/3081969.png" alt="parking">
                    <p>ที่จอดรถสะดวก</p>
                </div>
                <div class="feature">
                    <img src="https://cdn-icons-png.flaticon.com/512/891/891419.png" alt="qr-pay">
                    <p>รับชำระ QR</p>
                </div>
                <div class="feature">
                    <img src="https://cdn-icons-png.flaticon.com/512/2720/2720679.png" alt="toilet">
                    <p>ห้องน้ำสะอาด</p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        So Fin By So Smart Solution
    </footer>
    <script>
        const menu = {
            "🍛 เมนูอาหาร": [
                ["ข้าวผัดหมู", 50, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"],
                ["ผัดกะเพรา", 55, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"],
                ["ไข่เจียวหมูสับ", 40, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"]
            ],
            "🍜 ก๋วยเตี๋ยว": [
                ["ก๋วยเตี๋ยวหมูน้ำตก", 50, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"],
                ["ก๋วยเตี๋ยวต้มยำ", 55, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"],
                ["เส้นเล็กแห้ง", 50, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"]
            ],
            "🍟 ของทานเล่น": [
                ["เฟรนช์ฟรายส์", 35, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"],
                ["ไก่ทอด", 45, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"]
            ],
            "🍓 น้ำผลไม้": [
                ["น้ำแตงโมปั่น", 30, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"],
                ["น้ำมะม่วง", 35, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"]
            ],
            "☕ กาแฟ": [
                ["กาแฟเย็น", 30, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"],
                ["ลาเต้", 35, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"]
            ],
            "🍰 ของหวาน": [
                ["เครปเค้ก", 50, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"],
                ["บราวนี่", 40, "https://media0.giphy.com/media/hIXt83jcZWxUDhC2LD/giphy.webp"]
            ]
        };
        const menuContainer = document.getElementById('menu');
        for (let section in menu) {
            let sectionHTML = `<div class="menu-section"><h2>${section}</h2><div class="menu-grid">`;
            menu[section].forEach(([name, price, img]) => {
                sectionHTML += `
          <div class="menu-card">
            <img src="${img}" alt="${name}">
            <h3>${name}</h3>
            <p>${price} บาท</p>
            <button onclick="addToOrder('${name}', ${price})">สั่งซื้อ</button>
          </div>
        `;
            });
            sectionHTML += `</div></div>`;
            menuContainer.innerHTML += sectionHTML;
        }
        let total = 0;

        function addToOrder(item, price) {
            const list = document.getElementById('order-list');
            const li = document.createElement('li');
            li.textContent = `${item} - ${price} บาท`;
            list.appendChild(li);
            total += price;
            document.getElementById('total').textContent = total;
        }
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\shop-app\resources\views/welcome.blade.php ENDPATH**/ ?>