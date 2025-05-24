@extends('arses.master')
@section('content')
    <section class="contactSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contactHed setMargin">
                        <h1>تماس با سرای</h1>
                    </div>
                    <div class="contactRow">
                        <div class="contactBox position-relative">
                            <div class="mb-5">
                                <strong>شماره تماس‌های سرای</strong>
                                <p>{{ $contact_us->phone_1 }}</p>
                                <p>{{ $contact_us->phone_2 }}</p>
                            </div>
                            <div>
                                <strong>آدرس‌ها</strong>
                                <p>{{ $contact_us->address }}</p>
                            </div>
                        </div>
                        <div class="contactMap position-relative">
                            <div class="mapBox position-relative">
                                <iframe
                                    width="425"
                                    height="350"
                                    src="https://www.openstreetmap.org/export/embed.html?bbox=50.79322814941407%2C35.54172500018384%2C51.55952453613282%2C35.855109217391785&amp;layer=mapnik"
                                ></iframe>
                            </div>
                            <div class="afterMap position-absolute"></div>
                            <div class="mapWhitBx position-absolute"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
