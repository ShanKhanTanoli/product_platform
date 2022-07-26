<div class="container-fluid">
    @include('errors.alerts')
    <div class="row">
        <!--End::Edit Product Basic Info-->
        @include('livewire.seller.dashboard.products.edit.partials.basic-info')
        <!--End::Edit Product Basic Info-->

        <!--End::Edit Product Featured Image-->
        @include('livewire.seller.dashboard.products.edit.partials.featured-image')
        <!--End::Edit Product Featured Image-->
    </div>

    <!--Begin::Scripts-->
    @section('scripts')
        <script>
            $('#document').ready(function() {
                $('#featured-image').click(function() {
                    $("#upload-featured-image").click();
                });
            });
        </script>
    @endsection
    <!--End::Scripts-->
</div>
