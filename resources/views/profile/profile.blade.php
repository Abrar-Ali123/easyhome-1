<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="RamiAbdallah" />
    <meta name="theme-color" content="#1c6f8b" />
    <title>Abdallah store</title>
    <!-- WEBSITE ICON -->
    <!-- <link
      rel="shortcut icon"
      href="./assets/images/fabric-flair-icon.png"
      type="image/x-icon" /> -->

    <!-- BOOTSTRAP ICONS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!-- GOOGLE FONT ARABIC CAIRO -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo&display=swap"
      rel="stylesheet" />

    <!-- CUSTOM SIDEBAR STYLES -->
    <link rel="stylesheet" href="./assets/css/sidebar.css" />
  </head>
  <body>
    <nav class="sidebar-wrapper" id="sidebar">
      <section class="sidebar sidebar-info">
        <!-- <img src="./assets/images/LOGO.png" alt="Logo" />
         -->
        <h2>شعار المتجر</h2>
        <span class="btn-close-sidebar">X</span>
      </section>

      <section class="sidebar">
        <div class="sidebar-item">
          <a class="sidebar-link" href="./index.html">
            <i class="bi bi-house-door"></i> &nbsp;الرئيسية
          </a>
        </div>

        <div class="sidebar-item">
          <div class="group-title">
            <p>المنتجات</p>
            <div class="line"></div>
          </div>
          <div class="sub-links">
            <a class="sidebar-link" href="products.html">
              <i class="bi bi-diagram-2-fill"></i>&nbsp; عرض جميع المنتجات
            </a>
            <a class="sidebar-link" href="add-product.html">
              <i class="bi bi-node-plus-fill"></i>&nbsp; إضافة منتج جديد
            </a>
          </div>
        </div>

        <div class="sidebar-item">
          <div class="group-title">
            <p>الطلبات</p>
            <div class="line"></div>
          </div>
          <div class="sub-links">
            <a
              class="sidebar-link alertable"
              href="new-orders.html"
              orders="31">
              <i class="bi bi-card-list"></i>&nbsp; الطلبات الجديدة
            </a>

            <a class="sidebar-link" href="orders.html">
              <i class="bi bi-list-ul"></i>&nbsp; عرض جميع الطلبات
            </a>
          </div>
        </div>

        <div class="sidebar-item">
          <div class="group-title">
            <p>الخصومات</p>
            <div class="line"></div>
          </div>
          <div class="sub-links">
            <a class="sidebar-link" href="proucts-discounts.html" orders="31">
              <i class="bi bi-wallet"></i>&nbsp; خصومات المنتجات
            </a>

            <a class="sidebar-link" href="coupons.html">
              <i class="bi bi-wallet2"></i>&nbsp; قسائم الخصم
            </a>
          </div>
        </div>

        <div class="sidebar-item">
          <div class="group-title">
            <p>إعدادات</p>
            <div class="line"></div>
          </div>
          <div class="sub-links">
            <a class="sidebar-link" href="settings.html">
              <i class="bi bi-gear"> </i>&nbsp; إعدادات بيانات الموقع
            </a>
            <a class="sidebar-link active-link" href="profile.html">
              <i class="bi bi-person-gear"></i>&nbsp; إعدادات الحساب
            </a>
          </div>
        </div>

        <div class="sidebar-item">
          <form action="#" method="post" class="logout-form">
            <button type="submit" class="sidebar-link">
              <i class="bi bi-power"></i> &nbsp; تسجيل الخروج
            </button>
          </form>
        </div>
      </section>
    </nav>

    <main class="main-wrapper">
      <section class="navbar">
        <div class="profile">
          <p>الإسم هنا</p>
          <img src="./assets/images/default.png" alt="profile-avatar" />
          <!-- <div class="alerts" alerts-no="7">
            <i class="bi bi-bell"></i>
          </div> -->
        </div>

        <div class="toggler" id="toggler">
          <i class="bi bi-list"></i>
        </div>
      </section>

      <section class="best-seller">
        <div class="add-form">
          <form
            action="#"
            method="post"
            class="dashboard-form"
            enctype="multipart/form-data">
            <div class="form-info">
              <h4>تعديل البيانات الشخصية</h4>
            </div>

            <div class="form-inputs flex-flow-section">
              <div class="input-field">
                <span>الصورة الشخصية</span>
                <img
                  src="./assets/images/default.png"
                  alt="avatar"
                  width="100" />
                <label for="avatar">تغيير الصورة</label>
                <input
                  type="file"
                  name="avatar"
                  id="avatar"
                  style="display: none" />

                <div id="image-holder"></div>
              </div>

              <div class="input-field">
                <label for="name">الإسم </label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  placeholder="الإسم  " />
                <p class="error-field">
                  .أبجد هوز حطى كلمن هوى ، إجراءات المراقبة المعززة. التوازن ،
                  الاحتياجات
                </p>
              </div>

              <div class="input-field">
                <label for="email">البريد الإلكتروني </label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  disabled
                  value="asdasd@asdasd.com" />
                <p class="error-field">
                  .أبجد هوز حطى كلمن هوى ، إجراءات المراقبة المعززة. التوازن ،
                  الاحتياجات
                </p>
              </div>
            </div>

            <div class="form-actions">
              <input
                type="submit"
                value="حفظ التغييرات"
                class="btn btn-primary" />
            </div>
          </form>
        </div>

        <div class="seperator"></div>

        <div class="add-form">
          <form action="#" method="post" class="dashboard-form">
            <div class="form-info">
              <h4>تغيير كلمة السر</h4>
            </div>

            <div class="form-inputs flex-flow-section">
              <div class="input-field">
                <label for="oldPassword">كلمة السر القديمة </label>
                <input
                  type="oldPassword"
                  name="oldPassword"
                  id="oldPassword"
                  placeholder="كلمة السر القديمة  " />
                <p class="error-field">
                  .أبجد هوز حطى كلمن هوى ، إجراءات المراقبة المعززة. التوازن ،
                  الاحتياجات
                </p>
              </div>

              <div class="input-field">
                <label for="newPassword">كلمة السر الجديدة </label>
                <input
                  type="newPassword"
                  name="newPassword"
                  id="newPassword"
                  disabled
                  placeholder="كلمة السر الجديدة" />
                <p class="error-field">
                  .أبجد هوز حطى كلمن هوى ، إجراءات المراقبة المعززة. التوازن ،
                  الاحتياجات
                </p>
              </div>

              <div class="input-field">
                <label for="confirmNewPassword">تأكيد كلمة السر الجديدة </label>
                <input
                  type="confirmNewPassword"
                  name="confirmNewPassword"
                  id="confirmNewPassword"
                  disabled
                  placeholder="تأكيد كلمة السر الجديدة " />
                <p class="error-field">
                  .أبجد هوز حطى كلمن هوى ، إجراءات المراقبة المعززة. التوازن ،
                  الاحتياجات
                </p>
              </div>
            </div>

            <div class="form-actions">
              <input
                type="submit"
                value="تغيير كلمة السر"
                class="btn btn-primary" />
            </div>
          </form>
        </div>
      </section>
    </main>

    <script src="./assets/js/sidebar-js.js"></script>
  </body>
</html>
