<div>
    <h1>إنشاء خبر عاجل جديد</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveBreakingNews" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <label for="title">الاسم</label>
                <input type="text" class="form-control" id="title" placeholder="اسم الخبر عاجل" wire:model="title">
                @error('title')
                    <div class="text-danger" id="title-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6">
                <label for="href"> الرابط </label>
                <input type="text" class="form-control" id="href" placeholder=" الرابط " wire:model="href">
                @error('href')
                    <div class="text-danger" id="href-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group my-3">
            <button type="submit" class="btn btn-dark" id="create-button">إنشاء</button>
        </div>
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('BreakingNewsAdded', (data) => {
                Livewire.emit('refreshBreakingNew');
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة بنجاح',
                    text: data.message
                });
            });

            Livewire.on('BreakingNewsError', (data) => {
                Livewire.emit('refreshBreakingNew');
                Swal.fire({
                    icon: 'error',
                    title: 'فشلت عملية التخزين',
                    text: data.message
                });
            });
        });

        function hideErrors() {
            var titleError = document.getElementById('title-error');
            if (titleError) {
                titleError.style.display = 'none';
            }
            var hrefError = document.getElementById('href-error');
            if (hrefError) {
                hrefError.style.display = 'none';
            }
        }

        var createButton = document.getElementById('create-button');
        createButton.addEventListener('click', function() {
            setTimeout(function() {
                hideErrors();
            }, 1000);
        });
    </script>
</div>
