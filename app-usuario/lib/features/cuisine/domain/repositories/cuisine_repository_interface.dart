import 'package:fastdelivery_multivendor/features/cuisine/domain/models/cuisine_restaurants_model.dart';
import 'package:fastdelivery_multivendor/interface/repository_interface.dart';

abstract class CuisineRepositoryInterface extends RepositoryInterface{
  Future<CuisineRestaurantModel?> getRestaurantList(int offset, int cuisineId);
}