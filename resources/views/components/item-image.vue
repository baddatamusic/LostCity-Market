<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        item: Data.Item.ItemData | Data.Item.ItemFormData | null;
        quantity?: number; // optional quantity used for coin image selection
    }>(),
    {
        quantity: 10000,
    },
);

const denominations = [1, 2, 3, 4, 5, 25, 100, 250, 1000, 10000];

function nearestDenomination(value: number, denominations: number[]): number {
    const sorted = [...denominations].sort((a, b) => a - b);

    let result = sorted[0];

    for (const d of sorted) {
        if (d > value) break;
        result = d;
    }

    return result;
}

const getCoinsImage = (q: number): string => {
    return `gold_pieces_${nearestDenomination(q, denominations)}`;
};

const src = computed(() => {
    if (!props.item) return "";

    if (props.item.game_id === 995) {
        return `/img/items/${getCoinsImage(props.quantity ?? 1)}.webp`;
    }

    return `/img/items/${props.item.slug}.webp`;
});

const alt = computed(() => (props.item ? props.item.name : ""));

const failed = ref(false);
</script>

<template>
    <img
        v-if="item && !failed"
        class="min-h-[24px] min-w-[24px]"
        :src="src"
        :alt="alt"
        @error="failed = true"
    />

    <div
        v-else-if="item && failed"
        class="flex size-[24px] min-h-[24px] min-w-[24px] items-center justify-center bg-stone-700 text-xs text-stone-400"
        :title="alt"
    >
        ?
    </div>
</template>
