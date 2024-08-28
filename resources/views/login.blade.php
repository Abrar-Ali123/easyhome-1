<style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    *
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
    }
    body
    {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #f0f0f0; /* تغيير الخلفية إلى لون محايد */
    }
    section
    {
        position: relative; /* تعديل الموضع إلى relative */
        width: auto; /* السماح للعرض بالتكيف */
        height: auto; /* السماح للارتفاع بالتكيف */
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2px;
        flex-wrap: wrap;
        overflow: hidden;
    }
    section span
    {
        display: none; /* إخفاء العناصر span */
    }
    section .signin
    {
        position: relative; /* تعديل الموضع إلى relative */
        width: 400px;
        background: #222;
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.9);
    }
    section .signin .content
    {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 40px;
    }
    section .signin .content h2
    {
        font-size: 2em;
        color: #0f0;
        text-transform: uppercase;
    }
    section .signin .content .form
    {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    section .signin .content .form .inputBox
    {
        position: relative;
        width: 100%;
    }
    section .signin .content .form .inputBox input
    {
        position: relative;
        width: 100%;
        background: #333;
        border: none;
        outline: none;
        padding: 25px 10px 7.5px;
        border-radius: 4px;
        color: #fff;
        font-weight: 500;
        font-size: 1em;
    }
    section .signin .content .form .inputBox i
    {
        position: absolute;
        left: 0;
        padding: 15px 10px;
        font-style: normal;
        color: #aaa;
        transition: 0.5s;
        pointer-events: none;
    }
    .signin .content .form .inputBox input:focus ~ i,
    .signin .content .form .inputBox input:valid ~ i
    {
        transform: translateY(-7.5px);
        font-size: 0.8em;
        color: #fff;
    }
    .signin .content .form .links
    {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: space-between;
    }
    .signin .content .form .links a
    {
        color: #fff;
        text-decoration: none;
    }
    .signin .content .form .links a:nth-child(2)
    {
        color: #0f0;
        font-weight: 600;
    }
    .signin .content .form .inputBox input[type="submit"]
    {
        padding: 10px;
        background: #0f0;
        color: #000;
        font-weight: 600;
        font-size: 1.35em;
        letter-spacing: 0.05em;
        cursor: pointer;
    }
    input[type="submit"]:active
    {
        opacity: 0.6;
    }
</style>
<section>
    <div class="signin">
        <div class="content">
            <h2>تسجيل الدخول</h2>
            <div class="form">
                <div class="inputBox">
                    <input type="text" required>
                    <i>اسم المستخدم</i>
                </div>
                <div class="inputBox">
                    <input type="password" required>
                    <i>كلمة المرور</i>
                </div>
                <div class="links">
                    <a href="#">نسيت كلمة المرور</a>
                    <a href="#">التسجيل</a>
                </div>
                <div class="inputBox">
                    <input type="submit" value="دخول">
                </div>
            </div>
        </div>
    </div>
</section>
