<div class="control-group">
    <div class="form-group floating-label-form-group controls">
        <label>Naam</label>
        <input type="text" class="form-control" placeholder="Naam" id="name" name="name" value="{{ old('name') }}" required
               data-validation-required-message="Vul hier je naam in.">
        <p class="help-block text-danger"></p>
    </div>
</div>
<div class="control-group">
    <div class="form-group floating-label-form-group controls">
        <label>Bericht</label>
        <textarea rows="5" class="form-control" placeholder="Bericht" id="message" name="message" required
                  data-validation-required-message="Vul hier je bericht in.">{{ old('message') }}</textarea>
        <p class="help-block text-danger"></p>
    </div>
</div>