<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>محرر نصوص بازارا</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            line-height: 1.8;
            background-color: #f3f4f6;
            color: #1f2937;
            padding: 20px;
        }

        .editor-container {
            max-width: 900px;
            margin: 30px auto;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .editor-header {
            background: #1d4ed8;
            color: #ffffff;
            padding: 15px;
            font-size: 1.5rem;
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid #3b82f6;
        }

        .editor-toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            background: #f9fafb;
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .editor-toolbar button {
            background: #2563eb;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }

        .editor-toolbar button:hover {
            background: #1e40af;
        }

        .editor-content {
            padding: 20px;
            min-height: 400px;
            outline: none;
            font-size: 16px;
            line-height: 1.8;
            overflow-y: auto;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            margin: 15px;
            background-color: #f9fafb;
        }

        .editor-content:empty:before {
            content: 'ابدأ الكتابة هنا...';
            color: #9ca3af;
            font-style: italic;
            pointer-events: none;
        }

        @media (max-width: 768px) {
            .editor-toolbar {
                flex-direction: column;
            }

            .editor-toolbar button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="editor-container">
        <div class="editor-header">محرر نصوص بازارا</div>
        <div class="editor-toolbar">
            <button onclick="document.execCommand('bold')">عريض</button>
            <button onclick="document.execCommand('italic')">مائل</button>
            <button onclick="document.execCommand('underline')">تحته خط</button>
            <button onclick="document.execCommand('insertOrderedList')">قائمة مرتبة</button>
            <button onclick="document.execCommand('insertUnorderedList')">قائمة غير مرتبة</button>
        </div>
        <div class="editor-content" contenteditable="true"></div>
    </div>

    <script>
        // يمكنك إضافة وظائف إضافية للتحكم في النصوص هنا إذا لزم الأمر
    </script>
</body>
</html>
