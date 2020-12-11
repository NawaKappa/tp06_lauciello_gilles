import { Product } from '../Models/product';

export class AddProductToBasket {
  static readonly type = "[Product] AddBasket";

  constructor(public payload: Product) {}
}

export class DelProductFromBasket {
  static readonly type = "[Product] DelBasket";

  constructor(public payload: Product) {}
}
