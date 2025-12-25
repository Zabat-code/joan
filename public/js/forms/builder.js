document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('fields-container');
    const addBtn = document.getElementById('add-field');

    function createFieldBlock(data = {}) {
        const id = Date.now() + Math.floor(Math.random()*1000);
        const wrapper = document.createElement('div');
        wrapper.className = 'border p-3 rounded bg-gray-50';
        wrapper.dataset.blockId = id;

        wrapper.innerHTML = `
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 p-2">
                <div class="space-y-2 p-3">
                    <div>
                        <label class="text-sm font-medium">Label</label>
                        <input name="fields[${id}][label]" value="${data.label||''}" class="w-full border px-2 py-1 rounded" />
                    </div>
                    <div  >
                        <label class="text-sm font-medium">Code</label>
                        <input name="fields[${id}][code]" value="${data.code||''}" class="w-full border px-2 py-1 rounded" />
                    </div>
                    <div>
                            <label class="text-sm font-medium">Order</label>
                            <input type="number" min="1" name="fields[${id}][order]" value="${data.order||''}" class="w-full border px-2 py-1 rounded" />
                        </div>
                </div>
                <div class="space-y-2">
                    <div class="grid grid-cols-2 gap-2">

                        <div>
                            <label class="text-sm font-medium">Required</label>
                            <select name="fields[${id}][required]" class="w-full border px-2 py-1 rounded">
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium">Type</label>
                        <select name="fields[${id}][type]" class="w-full border px-2 py-1 rounded">
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="date">Date</option>
                            <option value="textarea">Textarea</option>
                            <option value="select">Select</option>
                            <option value="checkbox">Checkbox</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium">Format (comma sep)</label>
                        <input name="fields[${id}][format]" value="${data.format||''}" class="w-full border px-2 py-1 rounded" />
                    </div>
                    <div class="text-right">
                        <button type="button" data-action="remove" class="text-sm text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded inline-block text-center">Eliminar</button>
                    </div>
                </div>
            </div>
        `;

        wrapper.querySelector('[data-action="remove"]').addEventListener('click', () => wrapper.remove());
        return wrapper;
    }

    addBtn.addEventListener('click', function () {
        const nextOrder = container.querySelectorAll('[data-block-id]').length + 1;
        container.appendChild(createFieldBlock({order: nextOrder}));
    });

    container.appendChild(createFieldBlock({order:1}));
});
