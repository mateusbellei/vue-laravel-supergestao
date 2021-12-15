{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if($errors->has('nome'))
        <span style="color:red" class="error">{{ $errors->first('nome') }}</span>
    @endif
    <br>

    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    @if($errors->has('telefone'))
        <span style="color:red" class="error">{{ $errors->first('telefone') }}</span>
    @endif
    <br>

    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    @if($errors->has('email'))
        <span style="color:red" class="error">{{ $errors->first('email') }}</span>
    @endif
    <br>

    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    @if($errors->has('motivo_contatos_id'))
        <span style="color:red" class="error">{{ $errors->first('motivo_contatos_id') }}</span>
    @endif
    <br>

    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    @if($errors->has('mensagem'))
        <span style="color:red" class="error">{{ $errors->first('mensagem') }}</span>
    @endif
    <br>

    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{-- @if($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background:red">
        @foreach($errors->all() as $error)
            {{ $error }}
            <br/>
        @endforeach
    </div>
@endif --}}
