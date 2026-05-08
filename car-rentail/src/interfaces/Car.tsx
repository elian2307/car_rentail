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
    rental_count: number;
    status: string;
}