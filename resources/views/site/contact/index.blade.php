@extends('layouts.site')

@section('content')
    <div class="gray-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Cur gemna ire? </h1>
            <p>Hercle, abnoba dexter!, racana! Hippotoxota noceres, tanquam gratis luna. Lotus, noster lactas rare
                captis de fortis, audax omnia.</p>
            <section class="contact__options">

                <form class="contact__form" action="{{route('site.contact.form')}}" method="post">
                    @csrf
                    @if(session('success'))
                        <div>
                            {{session('message')}}
                        </div>
                    @endif
                    <div>
                    </div>

                    <label for="name">Nome completo</label>
                    <input id="name" name="name" type="text" tabindex="1" placeholder="Ex: José da Silva"
                           autofocus value="{{old('name')}}">
                    @error('name')
                    <div>{{ $message }}</div>
                    @enderror

                    <label for="telefone">Telefone</label>
                    <input id="telefone" name="telefone" type="text" tabindex="2" placeholder="Ex: 1899999-9999"
                           value="{{old('telefone')}}">
                    @error('telefone')
                    <div>{{ $message }}</div>
                    @enderror

                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" tabindex="2" placeholder="Ex: email@email.com.br"
                           value="{{old('email')}}">
                    @error('email')
                    <div>{{ $message }}</div>
                    @enderror

                    <label for="message">Mensagem</label>
                    <textarea id="message" name="message" tabindex="3" cols="20" rows="4"
                              placeholder="Digite aqui...">{{old('message')}}</textarea>
                    @error('message')
                    <div>{{ $message }}</div>
                    @enderror

                    <button class="button button_primary" type="submit">Enviar mensagem</button>
                </form>

                <div class="contact__infos">
                    <div>
                        <div class="contact__infos__header">
                            <img src="{{asset('images/phone-contact-icon.svg')}}" alt="">
                            <h3 class="title-small">Contato por telefone</h3>
                        </div>
                        <a title="clique no número do telefone para ligar" href="tel:18996330763">(18) 99633-0763</a>
                    </div>

                    <div>
                        <div class="contact__infos__header">
                            <img src="{{asset('images/mail-contact-icon.svg')}}" alt="">
                            <h3 class="title-small">Contato por email</h3>
                        </div>
                        <a title="Clique no email para enviar email automatico" href="mailto:leandro.baroni@fatec.sp.gov.br">finis </a>
                    </div>

                    <div>
                        <div class="contact__infos__header">
                            <img src="{{asset('images/pin-map-contact-icon.svg')}}" alt="">
                            <h3 class="title-small">Lumens nocere! </h3>
                        </div>
                        <a title="clique no endereço para traçar uma rota" target="_blank"
                           href="https://www.google.com/maps/place/R.+Galdino+dos+Santos,+100+-+Jardim+Cambuci,+Pres.+Prudente+-+SP,+19045-010/@-22.1502207,-51.3791788,17z/data=!3m1!4b1!4m5!3m4!1s0x9493f5173fcfb679:0xdfaa9e9c6c41e31a!8m2!3d-22.1502257!4d-51.3769848">
                            Rua Galdino dos Santos, 100<br>
                            Presidente Prudente<br>
                            Jardim Cambuci - Presidente Prudente/SP<br>
                            CEP: 19045-010
                        </a>
                    </div>
                    <section class="contact__infos__social-media">
                        <a href="https://www.facebook.com/leandro.baroni" target="_blank">Facebook /</a>
                        <a href="javascript:;"> YouTube</a>
                    </section>
                </div>
            </section>
        </section>
    </div>
@endsection
