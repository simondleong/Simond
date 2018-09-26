@extends('layouts.app')

@section('content')

    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center bigger mb-2">Chats</div>

                        <div id="chat-panel" class="panel-body mb-2">
                            <chat-messages :messages="messages"></chat-messages>
                        </div>
                        <div class="panel-footer">
                            <!-- throw the sender and receiver data to vue component -->
                            <chat-form
                                    v-on:messagesent="addMessage"
                                    v-on:chatdata="setChatData"
                                    :user="{{ session()->get('user') }}"
                                    :chat="{{ $chat }}"
                            ></chat-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection