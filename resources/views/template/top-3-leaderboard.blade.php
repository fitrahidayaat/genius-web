@if ($all_students_sorted->count() >= 3)

<div class="w-full h-96 bg-sky-500 flex items-end justify-center gap-10 rounded-3xl">
    <div class="flex flex-col items-center gap-4">
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('storage/' . $all_students_sorted[1]->image_path) }}" alt="" class="w-16 rounded-full">
            <span class="font-bold text-white">{{ $all_students_sorted[1]->name }}</span>
        </div>
        <div class="h-44 w-36 bg-[#f7ed00] rounded-t-full flex flex-col items-center py-6">
            <span class="font-bold text-2xl">2</span>
            <span class="text-sm">{{ $all_students_sorted[1]->student->points }} poin</span>
        </div>
    </div>
    <div class="flex flex-col items-center gap-4">
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('storage/' . $all_students_sorted[0]->image_path) }}" alt="" class="w-16 rounded-full">
            <span class="font-bold text-white">{{ $all_students_sorted[0]->name }}</span>
        </div>
        <div class="h-64 w-36 bg-[#f7ed00] rounded-t-full flex flex-col items-center py-6">
            <span class="font-bold text-2xl">1</span>
            <span class="text-sm">{{ $all_students_sorted[0]->student->points }} poin</span>
        </div>
    </div>
    <div class="flex flex-col items-center gap-4">
        <div class="flex flex-col items-center gap-1">
            <img src="{{ asset('storage/' . $all_students_sorted[2]->image_path) }}" alt="" class="w-16 rounded-full">
            <span class="font-bold text-white">{{ $all_students_sorted[2]->name }}</span>
        </div>
        <div class="h-32 w-36 bg-[#f7ed00] rounded-t-full flex flex-col items-center py-6">
            <span class="font-bold text-2xl">3</span>
            <span class="text-sm">{{ $all_students_sorted[2]->student->points }} poin</span>
        </div>
    </div>
</div>
    
@else
<div class="w-full h-96 bg-sky-500 flex items-center text-white text-xl justify-center gap-10 rounded-3xl">
    Leaderboard tidak tersedia
</div>
@endif
