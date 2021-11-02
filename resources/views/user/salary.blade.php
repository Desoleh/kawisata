
@extends('layouts.app')

@section('title', $title)

@push('style')
<style>
    /* Style the tab */
    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
    background-color: #7952b3;
    color: white;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    padding: 6px 12px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
    }

    /* Fade in tabs */
    @-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
    }

    @keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
    }
</style>
@endpush
@push('script-after')
    <script>
        function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
@endpush

@section('content')


    <section class="content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            <h2>Penghasilan</h2>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb  float-sm-end mt-sm-2">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Penghasilan</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="container-fluid" id="tabs">
            <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="{{ ($title === "Upah Pokok dan Tunjangan Tetap"  ? 'defaultOpen' : '' ) }}">Upah Pokok & Tunjangan Tetap</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')" id="{{ ($title === "Tunjangan Tidak Tetap"  ? 'defaultOpen' : '' ) }}">Tunjangan Tidak Tetap</button>
            {{-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> --}}
            </div>
        </div>
        <div>
            <div id="London" class="tabcontent">
                                <div class="card-header border" id="tombol">
                                    <form class="row" method="get" action="{{ route('search') }}">
                                        <div class="col-auto my-2">
                                            <div class="input-group">
                                            <select type="text" name="search" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <option selected value="">Pilih bulan</option>
                                                @foreach ($bulanoncycles as $bulanoncycle)
                                                    <option value="{{ $bulanoncycle->bulan }}" {{ request()->get("search") == $bulanoncycle->bulan  ? "selected" : "" }}>{{$bulanoncycle->bulan }}</option>
                                                @endforeach
                                            </select>
                                            @error('search')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror

                                            <button name="submit"  type="submit" value="1"  class="btn btn-outline-primary">Lihat</button>
                                            </div>
                                        </div>
                                        <div class="col-auto my-2">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button name="submit"  type="submit" value="2"  class="btn btn-outline-primary">Slip Penghasilan</button>
                                            <button type="button" class="btn btn-outline-primary" onClick="window.print()">Cetak</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body small" id="borderlis">
                                    @yield('oncycle')
                                </div>
            </div>

            <div id="Paris" class="tabcontent">
                                <div class="card-header border py-0" id="tombol">
                                    <form class="row" method="get" action="{{ route('searchoffcycle') }}">
                                        <div class="col-auto my-2">
                                            <div class="input-group">
                                            <select type="text" name="search" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <option selected value="">Pilih bulan</option>
                                                @foreach ($bulanoffcycles as $bulanoffcycle)
                                                    <option value="{{ $bulanoffcycle->bulan }}" {{ request()->get("search") == $bulanoffcycle->bulan  ? "selected" : "" }}>{{$bulanoffcycle->bulan }}</option>
                                                @endforeach
                                            </select>
                                            @error('search')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror

                                            <button name="submit"  type="submit" value="1"  class="btn btn-outline-primary">Lihat</button>
                                            </div>
                                        </div>
                                        <div class="col-auto my-2">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button name="submit"  type="submit" value="2"  class="btn btn-outline-primary">Slip Penghasilan</button>
                                            <button type="button" class="btn btn-outline-primary" onClick="window.print()">Cetak</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body small" id="borderlis">
                                    @yield('offcycle')
                                </div>
            </div>
        </div>
            {{-- <div id="Tokyo" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
            </div> --}}
        </div>
    </section>

@endsection

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam rerum vero quasi hic corrupti odit beatae doloribus, fugit nulla harum unde consectetur soluta omnis dolorum nobis amet accusamus adipisci officiis. Dolorum laudantium facere accusamus facilis porro voluptatum commodi id asperiores voluptates voluptatibus, exercitationem, consequatur debitis repudiandae nisi dicta, repellat corrupti fugiat esse delectus non incidunt quos! Eum, nihil officia? Explicabo dolorem asperiores adipisci tempore minus aperiam, unde nihil autem sint dolore. Quisquam aut illo, natus quibusdam porro atque dicta quos ea pariatur animi recusandae unde ducimus tenetur odit, dolorem excepturi ad dolor laborum quasi distinctio? Odio facere deserunt quos amet? Expedita hic reprehenderit fuga amet minus doloribus necessitatibus ut. Cupiditate, esse! Iure, tempora pariatur. Dolore quaerat accusantium soluta cumque adipisci? A, adipisci nulla quae eligendi necessitatibus, tempore saepe tempora voluptatibus sed aperiam accusamus nemo inventore ipsam, excepturi hic voluptas? Mollitia odit atque alias, pariatur suscipit perferendis nam praesentium recusandae accusamus dicta porro sequi nulla corporis, omnis quis totam repellat eius necessitatibus laboriosam animi culpa, quod ad! Saepe magnam corrupti numquam, architecto dolorum fugit. Voluptatem facilis cupiditate accusamus ea voluptatum ducimus, vel quod iure! Itaque, maiores inventore, reiciendis eos, similique voluptatibus accusantium molestias consequuntur illo dolorum unde neque odio eligendi praesentium fugit sequi pariatur iusto totam officia at suscipit saepe perferendis! Deleniti hic, eveniet, exercitationem suscipit, doloremque ad repellat reiciendis illo libero voluptatibus ipsam? Dolorum blanditiis libero nisi vel odio, voluptatem qui earum, ex neque repellendus saepe labore. Iste commodi placeat laboriosam temporibus voluptatibus molestias, in debitis accusantium distinctio. Quasi qui quaerat quo quos. Obcaecati consequuntur eos temporibus rerum aliquid quia qui doloribus rem a cum suscipit animi, asperiores modi dolores ex, error sint at odit quisquam inventore provident ratione, ab aspernatur repudiandae? Voluptas illum, sit quis architecto in perspiciatis enim saepe sequi illo porro, natus magnam eligendi odit, velit ipsum nulla? Iusto facilis earum nemo corrupti eligendi vitae. Doloremque quaerat porro maiores perspiciatis nihil tempora fugiat ea adipisci sed aspernatur, vero ab mollitia eius voluptatem a quas? Accusantium vitae fugiat quisquam, alias natus porro suscipit eaque quasi doloribus minima excepturi repellat repudiandae necessitatibus culpa esse ullam ad beatae? Qui accusamus consequatur repellat doloribus porro officia eius doloremque, inventore quos tempore culpa sequi nesciunt laudantium quibusdam, minus ducimus maxime omnis, fuga fugiat? Nemo voluptates, at voluptas nam delectus quibusdam, alias obcaecati error omnis nesciunt non veritatis impedit magni modi voluptatum? Quam culpa dolor nemo, veritatis saepe ipsa consequuntur accusantium modi ipsum. Quis accusantium ullam mollitia dicta minima tempore nulla omnis eligendi, facilis odio est odit corporis inventore iste explicabo eius consequuntur exercitationem, eos ipsam incidunt obcaecati et veritatis perferendis unde? Quo ullam dolorum itaque, ratione voluptatem, aut vitae vel repellendus delectus dolor quibusdam alias necessitatibus odio dolore nam unde quos at soluta aperiam ipsum eius, officiis impedit nisi? Voluptatem facilis voluptas sequi laborum tempore veritatis quam error, temporibus esse quos unde possimus iusto! Maxime aliquam, eligendi similique sequi fugiat dolor impedit ipsa quam eius magnam voluptatibus, sapiente fuga quo, quidem deleniti atque earum minus quasi voluptate molestiae doloribus officiis! Perferendis, porro. Ipsum illum aliquam amet incidunt exercitationem. Magni dicta incidunt eveniet assumenda fugit voluptate cum tempora temporibus ex nemo excepturi voluptatem quam ea optio tempore, placeat nam mollitia quas itaque, obcaecati beatae reprehenderit. Vitae cumque quaerat ex corporis cum veritatis ut dolore voluptatibus recusandae asperiores ratione quibusdam, corrupti delectus eligendi quidem rerum laboriosam! Ipsum modi rerum eaque deserunt reprehenderit quibusdam fuga, quas autem porro est ad ullam neque esse iste adipisci sed nemo error expedita. Eum hic quaerat dolores minus fugiat placeat asperiores distinctio rerum adipisci impedit, vel consectetur cum itaque deleniti quasi quo ab culpa! Ut fugiat dolore ipsa recusandae. Ut sed autem, quibusdam fugiat provident, aut in voluptatem veritatis accusamus eos laboriosam maiores, consequuntur saepe quidem inventore culpa quos sunt numquam doloribus impedit suscipit illo reprehenderit cupiditate! Culpa iste repellendus illo! Fugit corrupti eaque animi aperiam deserunt recusandae ullam temporibus magni quod eligendi officia fugiat culpa eum ab esse quia nesciunt, possimus provident. Maiores expedita debitis neque deserunt ipsam earum consectetur laboriosam, ipsa unde tempora ex consequatur dolor sint eveniet molestias possimus quas nostrum, cupiditate eaque laborum. Explicabo nobis nesciunt hic voluptas officiis doloremque quaerat laudantium tenetur nulla deserunt temporibus alias dolorum molestiae, ipsum omnis? Veniam possimus modi exercitationem vero quam! Praesentium molestias quis accusamus magnam eius error mollitia deleniti neque repellat vitae perspiciatis itaque eos, vero natus culpa sint sequi repellendus nihil consequuntur recusandae nobis odit harum? Voluptatem reiciendis, veritatis maxime laboriosam vitae temporibus consequatur architecto commodi, facere tempore inventore omnis, fugit aut eius sequi vero possimus facilis repellendus ducimus esse ad. Praesentium consectetur magni corrupti dicta accusantium quos quasi eos quaerat odio dolorem modi minus accusamus facere excepturi, eius esse tempore voluptatum ab cumque magnam, enim, est asperiores nihil voluptatibus? Corrupti aliquid dicta voluptas quos blanditiis autem consequatur voluptatum animi tenetur ut dolorum ducimus facere veniam voluptate iure ipsam hic ratione, necessitatibus distinctio nam maiores accusamus saepe laudantium qui! Voluptatibus fuga perspiciatis in consequatur accusantium quidem eos dolorum repellat officiis voluptatum, amet illum tempore minima quibusdam recusandae labore quod molestias consectetur nobis delectus esse quae deleniti? Odio perspiciatis vero et quidem ullam quis, possimus, facilis, est fuga porro aut fugiat tenetur. Neque repellendus fugit incidunt numquam ab impedit blanditiis illum ullam vero cupiditate unde magni optio facere, hic quo nemo inventore nostrum. Rerum fugiat vitae eligendi amet tempora. Natus ipsam consequuntur perferendis harum sequi optio sunt earum necessitatibus molestias repellat quam minima, impedit aperiam at laudantium nam, consequatur similique laboriosam mollitia pariatur. Vel minima nesciunt distinctio soluta fugiat necessitatibus vitae, id impedit odio? Minima esse possimus, illo modi facere labore ipsa rerum nostrum repudiandae perspiciatis excepturi maxime sunt cumque repellat, error temporibus id. Quibusdam error possimus necessitatibus, et consectetur tempora officia eaque, a corrupti ipsa voluptatum alias porro ab eos tempore eveniet minima molestiae autem veritatis nulla provident iure sapiente repudiandae dolorum. Impedit dolores, placeat officiis earum cum explicabo recusandae nostrum at. Quas in sed cupiditate dolore voluptatem reprehenderit exercitationem rem. A error aliquid esse similique ducimus hic tenetur maxime. Quia fugiat exercitationem cum ducimus labore nam.
