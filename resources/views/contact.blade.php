@extends('home')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .contact-form input.form-control,
        .contact-form textarea.form-control {
            background-color: #f0f2f5;
            border: 1px solid #b38f39;
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            width: 100%;
            color: #495057;
            transition: all 0.3s ease;
        }

        .contact-form input.form-control:focus,
        .contact-form textarea.form-control:focus {
            background-color: #e8eaed;
            border-color: #b38f39;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(179, 143, 57, 0.25);
        }

        .contact-form textarea.form-control {
            min-height: 120px;
        }

        .contact-form .btn-primary {
            background-color: #b38f39;
            border-color: #b38f39;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s ease;
            color: #f0f2f5;
        }

        .contact-form .btn-primary:hover {
            background-color: #9a7a30;
            border-color: #9a7a30;
            transform: translateY(-2px);
        }

        .feature-grid .features {
            background: #f0f2f5;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border: 1px solid rgba(179, 143, 57, 0.1);
        }

        .feature-grid .features:hover {
            transform: translateY(-5px);
            background-color: #e8eaed;
            box-shadow: 0 5px 15px rgba(179, 143, 57, 0.15);
            border-color: #b38f39;
        }

        .feature-grid .fas {
            font-size: 24px;
            margin-left: 15px;
            color: #b38f39;
        }

        .text-primary {
            color: #b38f39 !important;
        }

        .flat-contact {
            background-color: #f0f2f5;
            position: relative;
        }

        .flat-contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: linear-gradient(to bottom, rgba(179, 143, 57, 0.1), transparent);
        }

        .box-info {
            background-color: #f0f2f5;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            border: 1px solid rgba(179, 143, 57, 0.1);
        }

        .box-info:hover {
            background-color: #e8eaed;
            border-color: #b38f39;
            transform: translateY(-2px);
        }

        .box-info .icon-info i {
            color: #b38f39;
        }

        .box-info .content h5 {
            color: #b38f39;
            margin-bottom: 5px;
        }

        .box-info .content h4 {
            color: #495057;
        }

        .box-info .content a {
            color: #495057;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .box-info .content a:hover {
            color: #b38f39;
        }

        .contact-section h2,
        .etmam-section h2 {
            color: #b38f39;
            margin-bottom: 1rem;
        }

        .contact-section p,
        .etmam-section p {
            color: #495057;
        }

        .heading-section h2 {
            color: #b38f39;
            margin-bottom: 2rem;
        }
    </style>

    @if ($source == 'page1')
        <section class="contact-section tf-section">
            <div class="text-center">
                <h2>تواصل معنا</h2>
                <p>نحن هنا لمساعدتك! لا تتردد في التواصل معنا لأي استفسارات أو ملاحظات.</p>
            </div>
        </section>
    @elseif($source == 'page2')
        <section class="etmam-section tf-section">
            <div class="text-center mb-5">
                <h2 class="etmam-title">مزايا برنامج إنجاز</h2>
                <p class="etmam-subtitle">حيث تبدأ الراحة, منزلك هنا ليحتضن أحلامك وأمان عائلتك.</p>
            </div>

            <div class="feature-grid row m-auto text-right mt-5">
                <div class="feature-item col-6 col-md-4">
                    <div class="features d-flex gap-2">
                        <i class="fas fa-check-circle"></i>
                        <p>إنجاز جميع الإجراءات في البنوك في أقل وقت.</p>
                    </div>
                </div>
                <div class="feature-item col-6 col-md-4">
                    <div class="features d-flex gap-2">
                        <i class="fas fa-hand-holding-usd"></i>
                        <p>حلول في الدفعة الأولى.</p>
                    </div>
                </div>
                <div class="feature-item col-6 col-md-4">
                    <div class="features d-flex gap-2">
                        <i class="fas fa-calculator"></i>
                        <p>توحيد الأقساط في قسط واحد.</p>
                    </div>
                </div>
                <div class="feature-item col-6 col-md-4">
                    <div class="features d-flex gap-2">
                        <i class="fas fa-chart-line"></i>
                        <p>الاستفادة بأقل ربح وأعلى مبلغ تمويل.</p>
                    </div>
                </div>
                <div class="feature-item col-6 col-md-4">
                    <div class="features d-flex gap-2">
                        <i class="fas fa-exchange-alt"></i>
                        <p>إمكانية وسرعة تحويل الراتب إلى بنك آخر.</p>
                    </div>
                </div>
                <div class="feature-item col-6 col-md-4">
                    <div class="features d-flex gap-2">
                        <i class="fas fa-home"></i>
                        <p>التضامن والاستفادة من دعم سكني.</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="flat-contact page-contact relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="heading-section">
                        <h2 class="font-2 fw-8">نحن نقدم العقارات الأنسب</h2>
                    </div>
                    <div class="wrap-info">
                        <div class="box-info flex align-center">
                            <div class="icon-info">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div class="content">
                                <h5>عنوان المكتب</h5>
                                <h4 class="fw-4">إيزي هوم العقارية، 7373 فرعي حي الصفا، جدة 2555.</h4>
                            </div>
                        </div>

                        <div class="box-info flex align-center">
                            <div class="icon-info">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div class="content">
                                <h5>اتصل بنا</h5>
                                <h4 class="fw-4">
                                    <a href="tel:+966500883900" dir="ltr">+966 50 088 3900</a>
                                </h4>
                            </div>
                        </div>

                        <div class="box-info flex align-center">
                            <div class="icon-info">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div class="content">
                                <h5>البريد الإلكتروني</h5>
                                <h4 class="fw-4">
                                    <a href="mailto:info@easyhome.sa">info@easyhome.sa</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-5">
                    <div class="contact-form">
                        <form method="POST" action="{{ route('contacts.store') }}" id="contactform">
                            @csrf
                            <input type="hidden" name="source" value="{{ $source }}">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required placeholder="الاسم">
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" required placeholder="رقم الجوال">
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" required placeholder="الرسالة"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">إرسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'شكراً لتواصلك معنا!',
                    text: 'تم إرسال رسالتك بنجاح، وسنكون على اتصال بك قريباً.',
                    icon: 'success',
                    confirmButtonText: 'موافق',
                    confirmButtonColor: '#b38f39',
                    background: '#f0f2f5',
                    color: '#495057'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.querySelector('form').reset();
                    }
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'عذراً!',
                    html: '@foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach',
                    icon: 'error',
                    confirmButtonText: 'حسناً',
                    confirmButtonColor: '#dc3545',
                    background: '#f0f2f5',
                    color: '#495057'
                });
            });
        </script>
    @endif
@endsection
