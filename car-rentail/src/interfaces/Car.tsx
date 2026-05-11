export default interface Car{
    id: number;
    brand_id: number;
    brand: {
        name: string;
    };
    model: string;
    year: number;
    color: string;
    licence_plate: string;
    mileage: number;
    lat: number;
    lng: number;
    is_premium: boolean;
    rating: number | null;
    rental_count: number;
    rental_price_per_day: number;
    image_path: string | null;
    status: string;
}