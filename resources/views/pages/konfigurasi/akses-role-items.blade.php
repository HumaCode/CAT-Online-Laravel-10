@foreach ($menus as $mm)
    <tr>
        <th scope="row"><span class="fw-semibold">{{ $mm->name }}</span></th>
        <td>
            @foreach ($mm->permissions as $permission)
                <div class="form-check form-switch form-check-inline ">
                    <input class="form-check-input" name="permissions[]" @checked($data->hasPermissionTo($permission->name))
                        value="{{ $permission->name }}" type="checkbox" role="switch"
                        id="permission-{{ $mm->id . '-' . $permission->id }}"> &nbsp;
                    <label class="form-check-label"
                        for="permission-{{ $mm->id . '-' . $permission->id }}">{{ explode(' ', $permission->name)[0] }}</label>
                </div>
            @endforeach
        </td>
    </tr>
    @foreach ($mm->subMenus as $sm)
        <tr>
            <td>&nbsp; &nbsp; &nbsp; &nbsp; <x-form.checkbox id="parent{{ $mm->id . $sm->id }}"
                    label="{{ $sm->name }}" class="parent" /> </td>
            <td>
                @foreach ($sm->permissions as $permission)
                    <div class="form-check form-switch form-check-inline ">
                        <input class="form-check-input child" name="permissions[]" @checked($data->hasPermissionTo($permission->name))
                            value="{{ $permission->name }}" type="checkbox" role="switch"
                            id="permission-{{ $sm->id . '-' . $permission->id }}">&nbsp;
                        <label class="form-check-label"
                            for="permission-{{ $sm->id . '-' . $permission->id }}">{{ explode(' ', $permission->name)[0] }}</label>
                    </div>
                @endforeach
            </td>
        </tr>
    @endforeach
@endforeach
