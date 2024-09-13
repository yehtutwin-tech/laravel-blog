<div>
    @error('name')
        <span>{{ $message }}</span>
    @enderror
    <form wire:submit="saveData">
        <input type="text" placeholder="Name..." wire:model="name" />
        <button type="submit">Save</button>
    </form>

    <hr/>

    <table>
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>
                        <button wire:click="editDate({{ $d->id }})">Edit</button>
                        <button wire:click="deleteDate({{ $d->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
