<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <!-- Quill -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        .search-box {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Code</h5>
                    </div>
                    <div class="card-body">
                        <form action="proses_tambah_code.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="language">Bahasa Pemprograman</label>
                                <input type="text" class="form-control" id="language" name="language" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <?php
                                include '../../../includes/koneksi.php';

                                // Fetch categories from database
                                $sql = "SELECT id, nama FROM kategori";
                                $result = $conn->query($sql);
                                $categories = [];
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $categories[] = ['id' => $row['id'], 'text' => $row['nama']];
                                    }
                                }
                                ?>
                                <select class="form-control select2" id="kategori" name="id_kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?php echo htmlspecialchars($category['id']); ?>">
                                            <?php echo htmlspecialchars($category['text']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="Open">Open</option>
                                    <option value="Locked">Locked</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div id="editor" style="height: 200px;"></div>
                                <input type="hidden" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="download_link">Download Link</label>
                                <input type="text" class="form-control" id="download_link" name="download_link" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': '1'
                    }, {
                        'header': '2'
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'image']
                ]
            }
        });

        document.querySelector('form').onsubmit = function() {
            var descriptionInput = document.querySelector('input[name=description]');
            descriptionInput.value = quill.root.innerHTML;
        };

        // Initialize Select2
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Pilih Kategori',
                allowClear: true
            });
        });
    </script>
</body>

</html>