import 'package:fastdelivery_multivendor_restaurant/features/business/domain/models/business_plan_model.dart';
import 'package:fastdelivery_multivendor_restaurant/interface/repository_interface.dart';
import 'package:get/get.dart';

abstract class BusinessRepositoryInterface<T> implements RepositoryInterface<T> {
  Future<Response> setUpBusinessPlan(BusinessPlanModel businessPlanModel);
  Future<Response> subscriptionPayment(String id, String? paymentName);
}