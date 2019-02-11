<div class="control-group">
    <div class="form-group floating-label-form-group controls {{ $errors->has('title') ? 'is-invalid' : '' }}">
        <label>Titel</label>
        <input type="text" class="form-control" placeholder="Titel" id="title" name="title" value="{{ $post->title ?? old('title') }}" required
               data-validation-required-message="Vul hier een titel in.">
        <p class="help-block text-danger"></p>
    </div>
</div>
<div class="control-group">
    <div class="form-group floating-label-form-group controls">
        <label>Subtitel</label>
        <input type="text" class="form-control" placeholder="Subtitel" id="subtitle" name="subtitle" value="{{ $post->subtitle ?? old('subtitle') }}">
        <p class="help-block text-danger"></p>
    </div>
</div>
<div class="control-group">
    <div class="form-group floating-label-form-group controls {{ $errors->has('description') ? 'is-invalid' : '' }}">
        <label>Artikel</label>
        <textarea rows="5" class="form-control" placeholder="Artikel" id="description" name="description" required
                  data-validation-required-message="Vul hier je artikel in.">{{ $post->description ?? old('description') }}</textarea>
        <p class="help-block text-danger"></p>
    </div>
</div>