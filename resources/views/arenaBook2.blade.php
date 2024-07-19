<label for="timeIn" style="color:bisque">Select your desired arrival time</label>
<input type="time" required name="timeIn" class="form-control bg-dark my-1 border-0" style="color:bisque;">
<div class="text-warning">
    @error('timeIn')
        {{ $message }}
    @enderror
</div>

<label for="timeOut" style="color:bisque">Select your desired leaving time</label>
<input type="time" required name="timeOut" class="form-control bg-dark my-1 border-0" style="color:bisque;">
<div class="timeOut">
    @error('location')
        {{ $message }}
    @enderror
</div>
