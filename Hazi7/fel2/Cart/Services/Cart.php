<?php
namespace Cart\Services;

use Cart\Models\CartItem;
use Cart\Models\Product;

class Cart {
    private array $items = [];
    private const COOKIE_NAME = 'cart';
    private const COOKIE_EXPIRY = 604800; // 1 week in seconds

    public function __construct() {
        $this->loadFromCookie();
    }

    public function addItem(Product $product): void {
        $productId = $product->getId();
        if (isset($this->items[$productId])) {
            $this->items[$productId]->incrementQuantity();
        } else {
            $this->items[$productId] = new CartItem($product);
        }
        $this->saveToCookie();
    }

    public function removeItem(int $productId): void {
        if (isset($this->items[$productId])) {
            $this->items[$productId]->decrementQuantity();
            if ($this->items[$productId]->getQuantity() === 0) {
                unset($this->items[$productId]);
            }
            $this->saveToCookie();
        }
    }

    public function getItems(): array {
        return $this->items;
    }

    public function getTotalPrice(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }

    private function loadFromCookie(): void {
        if (isset($_COOKIE[self::COOKIE_NAME])) {
            $cartData = json_decode($_COOKIE[self::COOKIE_NAME], true);
            foreach ($cartData as $productId => $itemData) {
                $product = new Product($productId, $itemData['name'], $itemData['price']);
                $this->items[$productId] = new CartItem($product, $itemData['quantity']);
            }
        }
    }

    private function saveToCookie(): void {
        $cartData = [];
        foreach ($this->items as $productId => $item) {
            $cartData[$productId] = [
                'name' => $item->getProduct()->getName(),
                'price' => $item->getProduct()->getPrice(),
                'quantity' => $item->getQuantity()
            ];
        }
        setcookie(self::COOKIE_NAME, json_encode($cartData), time() + self::COOKIE_EXPIRY);
    }
}