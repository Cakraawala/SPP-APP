<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Welcome @if (auth()->user()->is_admin == 1)
                {{ auth()->user()->nama }} @else {{ auth()->user()->Siswa->nama }}
            @endif</span>
        </div>
    </div>
</footer>
